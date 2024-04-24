<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodeRequest;
use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{

    public function index()
    {
        $periode = Periode::all();

        return view('pages.periode.index', [
            'periode' => $periode
        ]);

    }
    public function create()
    {
        return view('pages.periode.create');
    }

    public function store(PeriodeRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Periode::create($data);

        return redirect()->route('periode.index');
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        return view('pages.periode.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function addTim(){
        return view('pages.periode.create');
    }
}
