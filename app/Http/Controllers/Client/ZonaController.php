<?php

namespace App\Http\Controllers\Client;

use App\Models\Tim;
use App\Models\Zona;
use App\Models\ZonaTim;
use App\Models\Regional;
use App\Models\MasterHutan;
use Illuminate\Http\Request;
use App\Http\Requests\ZonaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ZonaTimRequest;

class ZonaController extends Controller
{

    public function index()
    {
        $tim = Tim::all();
        $zona = Zona::with('regional.type_hutan', 'tim.namaTim')->get();
        // $zonaTim = ZonaTim::find($id);

        // dd($zona->toArray());

        return view('pages.zona.index', [
            'zona' => $zona,
            'tim' => $tim,
        ]);
    }


    public function create()
    {
        $regional = Regional::all();
        $masterHutan = MasterHutan::all();
        return view('pages.zona.create', [
            'masterHutan' => $masterHutan,
            'regional' => $regional
        ]);
    }


    public function store(ZonaRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Zona::create($data);

        return redirect()->route('zona.index');
    }

    public function tambahTim(ZonaTimRequest $request)
    {

        $zonaTim = $request->all();
        ZonaTim::create($zonaTim);

        return redirect()->route('zona.index');
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

    public function destroy(string $id)
    {
        $zona = Zona::findorFail($id);
        $zona->delete();

        return redirect()->route('zona.index');
    }
}
