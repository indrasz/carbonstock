<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Tim;
use App\Models\Zona;
use App\Models\ZonaTim;
use App\Models\Regional;
use App\Models\MasterHutan;
use App\Models\RegionalTim;
use Illuminate\Http\Request;
use App\Http\Requests\ZonaRequest;
use App\Http\Controllers\Controller;
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
        // dd($data);
        Zona::create($data);

        return redirect()->route('region.show', $data['id_regional']);
    }

    public function tambahTim(Request $request)
    {

        // $zonaTim = $request->all();
        // ZonaTim::create($zonaTim);

        // return redirect()->route('zona.index');

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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
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
