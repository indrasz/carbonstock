<?php

namespace App\Http\Controllers\Client;

use App\Models\Tim;
use App\Models\Periode;
use App\Models\Regional;
use App\Models\MasterHutan;
use App\Models\RegionalTim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Http\Requests\RegionalTimRequest;

class RegionController extends Controller
{

    public function index()
    {
        $tim = Tim::all();
        $regional = Regional::with('type_hutan', 'periode', 'tim.namaTim')->get();

        // dd($tim);
        return view('pages.region.index', [
            'regional' => $regional,
            'tim' => $tim,
        ]);
    }


    public function create()
    {
        $masterHutan = MasterHutan::all();
        $periode = Periode::all();
        return view('pages.region.create', [
            'masterHutan' => $masterHutan,
            'periode' => $periode,
        ]);
    }


    public function store(RegionRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Regional::create($data);

        return redirect()->route('region.index');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function storeTeam(Request $request)
    {
        $validatedData = $request->validate([
            'id_regional' => 'required:integer',
            'id_tim' => 'required|array',
            'id_tim.*' => 'required:integer',
        ]);

        $timExists = false;

        foreach ($validatedData['id_tim'] as $idTim) {
            if (RegionalTim::where('id_regional', $validatedData['id_regional'])->where('id_tim', $idTim)->exists()) {
                $timExists = true;
                break;
            }
        }

        if ($timExists) {
            session()->flash('error', 'Gagal menambahkan, tim telah terdaftar di regional');
            return redirect()->back(); // Redirect ke halaman sebelumnya
        }

        foreach ($validatedData['id_tim'] as $idTim) {
            $regionalTim = new RegionalTim();
            $regionalTim->id_regional = $validatedData['id_regional'];
            $regionalTim->id_tim = $idTim;
            $regionalTim->save();
        }

        return redirect()->route('region.index');
    }

    public function destroy(string $id)
    {
        $region = Regional::findorFail($id);
        $region->delete();

        return redirect()->route('region.index');
    }
}
