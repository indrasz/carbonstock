<?php

namespace App\Http\Controllers\Client;

use App\Models\Regional;
use App\Models\MasterHutan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ZonaRequest;
use App\Models\Zona;

class ZonaController extends Controller
{

    public function index()
    {
        $zona = Zona::with('regional.type_hutan', 'tim')->get();
        return view('pages.zona.index',[
            'zona' => $zona,
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
        //
    }
}
