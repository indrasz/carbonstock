<?php

namespace App\Http\Controllers\Client;

use App\Models\Plot;
use App\Models\Hamparan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlotAreaRequest;
use App\Models\MasterPlot;
use App\Models\SubplotASemai;
use App\Models\SubplotASeresah;
use App\Models\SubplotATumbuhanBawah;
use App\Models\SubplotB;
use App\Models\SubplotC;
use App\Models\SubplotDNekromas;
use App\Models\SubplotDPohon;
use App\Models\SubplotDTanah;

class PlotAreaController extends Controller
{
    public function index()
    {

        $plotArea = Plot::with('plot', 'hamparan')->get();
        return view('pages.plot-area.index',[
            'plotArea' => $plotArea
        ]);
    }


    public function create()
    {
        $hamparan = Hamparan::all();
        $masterPlot = MasterPlot::all();
        return view('pages.plot-area.create',[
            'hamparan' => $hamparan,
            'masterPlot' => $masterPlot
        ]);
    }


    public function store(PlotAreaRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Plot::create($data);

        return redirect()->route('plot-area.index');
    }


    public function show(string $id)
    {
        return view('pages.plot-area.show');
    }


    public function edit(string $id)
    {
        $seresah = SubplotASeresah::all();
        $semai = SubplotASemai::all();
        $tumbuhanBawah = SubplotATumbuhanBawah::all();

        $tiang = SubplotB::all();
        $pancang = SubplotC::all();

        $necromass = SubplotDNekromas::all();
        $pohon = SubplotDPohon::all();
        $tanah = SubplotDTanah::all();

        return view('pages.plot-area.show',[
            'seresah' => $seresah,
            'semai' => $semai,
            'tumbuhanBawah' => $tumbuhanBawah,
            'tiang' => $tiang,
            'pancang' => $pancang,
            'necromass' => $necromass,
            'pohon' => $pohon,
            'tanah' => $tanah
        ]);
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $plot = Plot::findorFail($id);
        $plot->delete();

        return redirect()->route('plot-area.index');
    }
}
