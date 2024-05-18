<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Tim;
use App\Models\Zona;
use App\Models\ZonaTim;
use App\Models\Regional;
use App\Models\MasterHutan;
use App\Models\RegionalTim;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ZonaRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ZonaTimRequest;

class ZonaController extends Controller
{
    public function index()
    {
        $regionalTim = Regional::with('tim.namaTim')->get();
        $zona = Zona::with('regional.type_hutan', 'tim.namaTim')->get();

        return view('pages.zona.index', [
            'zona' => $zona,
            'regionalTim' => $regionalTim,
        ]);
    }


    public function create($regionalId)
    {
        $regional = Regional::findOrFail($regionalId);
        $masterHutan = MasterHutan::all();
        return view('pages.zona.create', [
            'masterHutan' => $masterHutan,
            'regional' => $regional,
            'regionalId' => $regionalId,
        ]);
    }


    public function store(ZonaRequest $request)
    {

        $data = $request->all();

        $insert = Zona::create($data);

        if ($request->hasFile('file')) {
            $dir = public_path('zona_' . $insert->id);

            if (!File::exists($dir)) {
                try {
                    File::makeDirectory($dir, 0777, true);
                    Log::info('Directory created: ' . $dir);
                } catch (\Exception $e) {
                    Log::error('Directory creation error: ' . $e->getMessage());
                    return redirect()->back()->withErrors(['file' => 'Failed to create directory.']);
                }
            }

            $file = $request->file('file');
            $uniqueName = Str::random(6) . '_' . $file->getClientOriginalName();

            while (File::exists($dir . '/' . $uniqueName)) {
                $uniqueName = Str::random(6) . '_' . $file->getClientOriginalName();
            }
            try {
                $file->move($dir, $uniqueName);
                // dd('File moved successfully: ' . $dir . '/' . $uniqueName);
            } catch (\Exception $e) {
                // dd('File upload error: ' . $e->getMessage());
                return redirect()->back()->withErrors(['file' => 'Failed to upload file. Please try again.']);
            }
        }

        return redirect()->route('region.show', $data['id_regional']);
    }

    public function tambahTim(Request $request)
    {

        $validatedData = $request->validate([
            'id_zona' => 'required:integer',
            'id_tim' => 'required|array',
            'id_tim.*' => 'required:integer',
        ]);

        $timExists = false;

        foreach ($validatedData['id_tim'] as $idTim) {
            if (ZonaTim::where('id_zona', $validatedData['id_zona'])->where('id_tim', $idTim)->exists()) {
                $timExists = true;
                break;
            }
        }

        if ($timExists) {
            session()->flash('error', 'Gagal menambahkan, tim telah terdaftar di regional');
            return redirect()->back(); // Redirect ke halaman sebelumnya
        }

        foreach ($validatedData['id_tim'] as $idTim) {
            $zonaTim = new ZonaTim();
            $zonaTim->id_zona = $validatedData['id_zona'];
            $zonaTim->id_tim = $idTim;
            $zonaTim->save();
        }

        return redirect()->route('zona.index');
    }


    public function show(string $id)
    {
        $zona = Zona::with(['hamparan'])->findOrFail($id);

        return view('pages.zona.show', [
            'zona' => $zona,
            'zonaId' => $id,
        ]);
    }

    public function edit(string $id, $regionalId)
    {
        $zona = Zona::findOrFail($id);
        $masterHutan = MasterHutan::all();
        return view('pages.zona.edit', [
            'zona' => $zona,
            'masterHutan' => $masterHutan,
            'regionalId' => $regionalId
            // 'periode' => $periode,
        ]);
    }

    public function update(ZonaRequest $request, string $id)
    {
        $zona = Zona::findOrFail($id);

        $data = $request->all();
        $zona->update($data);

        // dd($zona);

        return redirect()->route('region.show', $data['id_regional']);
    }

    public function destroy(string $id)
    {
        try {
            $zona = Zona::findOrFail($id);

            // dd($zona);
            $zona->delete();

            toastr()->success('Zona berhasil dihapus.');
        } catch (Exception $e) {
            toastr()->error('Gagal menghapus zona. Silakan coba lagi.');
        }

        return redirect()->route('zona.index');
    }
}
