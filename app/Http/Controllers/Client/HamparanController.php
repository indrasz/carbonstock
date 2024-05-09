<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\HamparanRequest;
use App\Models\Hamparan;
use App\Models\Zona;
use Illuminate\Http\Request;

class HamparanController extends Controller
{
    public function index()
    {
        $hamparan = Hamparan::with('zona')->get();

        return view('pages.hamparan.index',[
            'hamparan' => $hamparan
        ]);
    }

    public function create($zonaId)
    {
        $zona = Zona::findOrFail($zonaId);
        return view('pages.hamparan.create', [
            'zona' => $zona,
            'zonaId' => $zonaId,
        ]);
    }

    public function store(HamparanRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Hamparan::create($data);

        return redirect()->route('hamparan.index');
    }

    public function show(string $id)
    {
        $hamparan = Hamparan::with(['plot'])->findOrFail($id);

        return view('pages.hamparan.show', [
            'hamparan' => $hamparan,
            'hamparanId' => $id,
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
        $hamparan = Hamparan::findorFail($id);
        $hamparan->delete();

        return redirect()->route('hamparan.index');
    }
}
