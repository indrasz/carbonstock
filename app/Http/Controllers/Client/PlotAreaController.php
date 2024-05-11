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
        return view('pages.plot-area.index', [
            'plotArea' => $plotArea
        ]);
    }


    public function create($hamparanId)
    {
        $hamparan = Hamparan::findOrFail($hamparanId);
        $masterPlot = MasterPlot::all();
        return view('pages.plot-area.create', [
            'hamparan' => $hamparan,
            'masterPlot' => $masterPlot,
            'hamparanId' => $hamparanId,
        ]);
    }


    public function store(PlotAreaRequest $request)
    {
        $data = $request->all();
        // dd($data);
        Plot::create($data);

        return redirect()->route('hamparan.show', $data['id_hamparan']);
    }


    public function show(string $id)
    {
        $plot = Plot::with([
            'subplotASemai',
            'subplotASeresah',
            'subplotATumbuhanBawah',
            'subplotC',
            'subplotB',
            'subplotDNekromas',
            'subplotDPohon',
            'subplotDTanah'
        ])->findOrFail($id);

        $avgCV = $this->getAvgCarbonValue($plot);
        $avgCA = $this->getAvgCarbonAbsorb($plot);
        return view('pages.plot-area.show', [
            'plot' => $plot,
            'plotId' => $id,
            'avgCarbonValue' => $avgCV,
            'avgCarbonAbsorb' => $avgCA
        ]);
        // return view('pages.plot-area.show');
    }

    private function getAvgCarbonValue($plot)
    {
        $averageValues = [];

        $averageValues['subplotASemai'] = $plot->subplotASemai->avg('carbon_value');
        $averageValues['subplotASeresah'] = $plot->subplotASeresah->avg('carbon_value');
        $averageValues['subplotATumbuhanBawah'] = $plot->subplotATumbuhanBawah->avg('carbon_value');
        $averageValues['subplotB'] = $plot->subplotB->avg('carbon_value');
        $averageValues['subplotC'] = $plot->subplotC->avg('carbon_value');
        $averageValues['subplotDNekromas'] = $plot->subplotDNekromas->avg('carbon_value');
        $averageValues['subplotDPohon'] = $plot->subplotDPohon->avg('carbon_value');
        $averageValues['subplotDTanah'] = $plot->subplotDTanah->avg('carbon_ton');

        return $averageValues;
    }

    private function getAvgCarbonAbsorb($plot)
    {
        $averageValues = [];

        $averageValues['subplotASemai'] = $plot->subplotASemai->avg('carbon_absorb');
        $averageValues['subplotASeresah'] = $plot->subplotASeresah->avg('carbon_absorb');
        $averageValues['subplotATumbuhanBawah'] = $plot->subplotATumbuhanBawah->avg('carbon_absorb');
        $averageValues['subplotB'] = $plot->subplotB->avg('carbon_absorb');
        $averageValues['subplotC'] = $plot->subplotC->avg('carbon_absorb');
        $averageValues['subplotDNekromas'] = $plot->subplotDNekromas->avg('carbon_absorb');
        $averageValues['subplotDPohon'] = $plot->subplotDPohon->avg('carbon_absorb');
        $averageValues['subplotDTanah'] = $plot->subplotDTanah->avg('carbon_absorb');

        return $averageValues;
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

        return view('pages.plot-area.show', [
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
