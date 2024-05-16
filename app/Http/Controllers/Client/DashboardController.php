<?php

namespace App\Http\Controllers\Client;

use App\Models\Zona;
use App\Models\Hamparan;
use App\Models\Regional;
use App\Models\SubplotB;
use Illuminate\Http\Request;
use App\Models\SubplotASemai;
use App\Models\SubplotASeresah;
use App\Http\Controllers\Controller;
use App\Models\SubplotATumbuhanBawah;
use App\Models\SubplotC;
use App\Models\SubplotDNekromas;
use App\Models\SubplotDPohon;
use App\Models\SubplotDTanah;

class DashboardController extends Controller
{
    public function index()
    {

        $regionalData = Regional::with([
            'zona.hamparan.plot.subplotA' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotASemai' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotASeresah' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotATumbuhanBawah' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotB' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotC' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotD' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotDNekromas' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotDTanah' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            },
            'zona.hamparan.plot.subplotDPohon' => function ($query) {
                $query->orderBy('updated_at', 'desc');
            }
        ])->get();


        $seresah = SubplotASeresah::orderBy('updated_at', 'desc')->paginate(25);
        $semai = SubplotASemai::orderBy('updated_at', 'desc')->paginate(25);
        $tumbuhanBawah = SubplotATumbuhanBawah::orderBy('updated_at', 'desc')->paginate(25);

        $tiang = SubplotC::orderBy('updated_at', 'desc')->paginate(25);
        $pancang = SubplotB::orderBy('updated_at', 'desc')->paginate(25);

        $necromass = SubplotDNekromas::orderBy('updated_at', 'desc')->paginate(25);
        $pohon = SubplotDPohon::orderBy('updated_at', 'desc')->paginate(25);
        $tanah = SubplotDTanah::orderBy('updated_at', 'desc')->paginate(25);

        $regionData = [];
        $sumCarbonValuePlot = 0;
        $sumCarbonAbsorbPlot = 0;

        foreach ($regionalData as $regional) {

            $avgCV = [
                // 'subplotA' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotA->avg('carbon_value'),
                'subplotASemai' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASemai->avg('carbon_value'),
                'subplotASeresah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASeresah->avg('carbon_value'),
                'subplotATumbuhanBawah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotATumbuhanBawah->avg('carbon_value'),
                'subplotB' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotB->avg('carbon_value'),
                'subplotC' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotC->avg('carbon_value'),
                // 'subplotD' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotD->avg('carbon_value'),
                'subplotDNekromas' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDNekromas->avg('carbon_value'),
                'subplotDPohon' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDPohon->avg('carbon_value'),
                'subplotDTanah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDTanah->avg('carbon_ton'),
            ];

            $avgCA = [
                // 'subplotA' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotA->avg('carbon_value'),
                'subplotASemai' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASemai->avg('carbon_absorb'),
                'subplotASeresah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASeresah->avg('carbon_absorb'),
                'subplotATumbuhanBawah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotATumbuhanBawah->avg('carbon_absorb'),
                'subplotB' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotB->avg('carbon_absorb'),
                'subplotC' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotC->avg('carbon_absorb'),
                // 'subplotD' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotD->avg('carbon_absorb'),
                'subplotDNekromas' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDNekromas->avg('carbon_absorb'),
                'subplotDPohon' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDPohon->avg('carbon_absorb'),
                'subplotDTanah' => $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDTanah->avg('carbon_absorb'),
            ];

            //get value carbon value and carbon absorb Subplot A Seresah

            $subplotSeresah = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASeresah;

            $totalCVSeresah = $subplotSeresah->sum('carbon_value');
            $totalCASeresah = $subplotSeresah->sum('carbon_absorb');
            $uniquePlotIdSeresah = $subplotSeresah->unique('plot_id')->count();

            $cvSeresah = $uniquePlotIdSeresah !== 0 ? $totalCVSeresah / $uniquePlotIdSeresah : 0;
            $caSeresah = $uniquePlotIdSeresah !== 0 ? $totalCASeresah / $uniquePlotIdSeresah : 0;

            $valueCVSeresah = number_format(($cvSeresah / 1000000) * 10000, 2);
            $valueCASeresah = number_format(($caSeresah / 1000000) * 10000, 2);

            //get value carbon value and carbon absorb Subplot A Semai

            $subplotSemai = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotASemai;

            $totalCVSemai = $subplotSemai->sum('carbon_value');
            $totalCASemai = $subplotSemai->sum('carbon_absorb');
            $uniquePlotIdSemai = $subplotSemai->unique('plot_id')->count();

            $cvSemai = $uniquePlotIdSemai !== 0 ? $totalCVSemai / $uniquePlotIdSemai : 0;
            $caSemai = $uniquePlotIdSemai !== 0 ? $totalCASemai / $uniquePlotIdSemai : 0;

            $valueCVSemai = number_format(($cvSemai / 1000000) * 10000, 2);
            $valueCASemai = number_format(($caSemai / 1000000) * 10000, 2);

            //get value carbon value and carbon absorb Subplot A Tumbuhan Bawah

            $subplotTumbuhanBawah = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotATumbuhanBawah;

            $totalCVTumbuhanBawah = $subplotTumbuhanBawah->sum('carbon_value');
            $totalCATumbuhanBawah = $subplotTumbuhanBawah->sum('carbon_absorb');
            $uniquePlotIdTumbuhanBawah = $subplotTumbuhanBawah->unique('plot_id')->count();

            $cvTumbuhanBawah = $uniquePlotIdTumbuhanBawah !== 0 ? $totalCVTumbuhanBawah / $uniquePlotIdTumbuhanBawah : 0;
            $caTumbuhanBawah = $uniquePlotIdTumbuhanBawah !== 0 ? $totalCATumbuhanBawah / $uniquePlotIdTumbuhanBawah : 0;

            $valueCVTumbuhanBawah = number_format(($cvTumbuhanBawah / 1000000) * 10000, 2);
            $valueCATumbuhanBawah = number_format(($caTumbuhanBawah / 1000000) * 10000, 2);

            //get value carbon value and carbon absorb Subplot B Pancang

            $subplotB = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotB;

            $avgCVSubplotB = $subplotB->groupBy('plot_id')->map(function ($groupedPlots) {

                $carbonValue = ($groupedPlots->avg('carbon_value') * ($groupedPlots->count() / 25) * 10000) / 1000;
                $carbonAbsorb = ($groupedPlots->avg('carbon_absorb') * ($groupedPlots->count() / 25) * 10000) / 1000;

                return [
                    'plot_id' => $groupedPlots->first()->plot_id,
                    'avg' => $groupedPlots->avg('carbon_value'),
                    'total' => $groupedPlots->count(),
                    'carbon_value' => $carbonValue,
                    'carbon_absorb' => $carbonAbsorb,
                ];
            })->values();
            $avgArrayCVSubplotB = $avgCVSubplotB->toArray();


            $totalAvgCVSubplotB = number_format(collect($avgArrayCVSubplotB)->avg('carbon_value'), 2);
            $totalAvgCASubplotB = number_format(collect($avgArrayCVSubplotB)->avg('carbon_absorb'), 2);

            //get value carbon value and carbon absorb Subplot C Tiang

            $subplotC = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotC;

            $avgSubplotC = $subplotC->groupBy('plot_id')->map(function ($groupedPlots) {

                $carbonValue = ($groupedPlots->avg('carbon_value') * ($groupedPlots->count() / 100) * 10000) / 1000;
                $carbonAbsorb = ($groupedPlots->avg('carbon_absorb') * ($groupedPlots->count() / 100) * 10000) / 1000;

                return [
                    'plot_id' => $groupedPlots->first()->plot_id,
                    'avg' => $groupedPlots->avg('carbon_value'),
                    'total' => $groupedPlots->count(),
                    'carbon_value' => $carbonValue,
                    'carbon_absorb' => $carbonAbsorb,
                ];
            })->values();
            $avgArraySubplotC = $avgSubplotC->toArray();

            $totalAvgCVSubplotC = number_format(collect($avgArraySubplotC)->avg('carbon_value'), 2);
            $totalAvgCASubplotC = number_format(collect($avgArraySubplotC)->avg('carbon_absorb'), 2);

            //get value carbon value and carbon absorb Subplot D Necromass
            $subplotsDNekromas = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDNekromas;

            $totalCVNekromas = $subplotsDNekromas->sum('carbon_value');
            $totalCANekromas = $subplotsDNekromas->sum('carbon_absorb');
            $uniquePlotIds = $subplotsDNekromas->unique('plot_id')->count();
            $cvNekromas = $uniquePlotIds !== 0 ? $totalCVNekromas / $uniquePlotIds : 0;
            $caNekromas = $uniquePlotIds !== 0 ? $totalCANekromas / $uniquePlotIds : 0;

            $valueCVNekromas = number_format(($cvNekromas / 1000) * 10000 / 400, 2);
            $valueCANekromas = number_format(($caNekromas / 1000) * 10000 / 400, 2);

            //get value carbon value and carbon absorb Subplot D Pohon

            $subplotPohon = $regional->zona->flatMap->hamparan->flatMap->plot->flatMap->subplotDPohon;

            $avgSubplotPohon = $subplotPohon->groupBy('plot_id')->map(function ($groupedPlots) {

                $carbonValue = ($groupedPlots->avg('carbon_value') * ($groupedPlots->count() / 400) * 10000) / 1000;
                $carbonAbsorb = ($groupedPlots->avg('carbon_absorb') * ($groupedPlots->count() / 400) * 10000) / 1000;

                return [
                    'plot_id' => $groupedPlots->first()->plot_id,
                    'avg' => $groupedPlots->avg('carbon_value'),
                    'total' => $groupedPlots->count(),
                    'carbon_value' => $carbonValue,
                    'carbon_absorb' => $carbonAbsorb,
                ];
            })->values();
            $avgArraySubplotPohon = $avgSubplotPohon->toArray();

            // dd($avgArraySubplotPohon);

            $totalAvgCVSubplotPohon = number_format(collect($avgArraySubplotPohon)->avg('carbon_value'), 2);
            $totalAvgCASubplotPohon = number_format(collect($avgArraySubplotPohon)->avg('carbon_absorb'), 2);

            //get value carbon value and carbon absorb Subplot D Tanah

            $totalCVTanah = number_format($avgCV['subplotDTanah'], 2);
            $totalCATanah = number_format($avgCA['subplotDTanah'], 2);

            $regionCarbonValuePlot = (float)$valueCVSemai + (float)$valueCVSeresah  + (float)$totalAvgCVSubplotB + (float)$totalAvgCVSubplotC + (float)$valueCVNekromas + (float)$totalAvgCVSubplotPohon + (float)$totalCVTanah;
            $regionCarbonAbsorbPlot = (float)$valueCASemai + (float)$valueCASeresah + (float)$totalAvgCASubplotB + (float)$totalAvgCASubplotC + (float)$totalAvgCASubplotPohon;

            $sumCarbonValuePlot += (float)$valueCVSemai + (float)$valueCVSeresah + (float)$totalAvgCVSubplotB + (float)$totalAvgCVSubplotC + (float)$valueCVNekromas + (float)$totalAvgCVSubplotPohon + (float)$totalCVTanah;
            $sumCarbonAbsorbPlot += (float)$valueCASemai + (float)$valueCASeresah + (float)$totalAvgCASubplotB + (float)$totalAvgCASubplotC + (float)$totalAvgCASubplotPohon;

            $regionData[] = [
                'label' => $regional->nama_regional,
                'carbon_value' => $regionCarbonValuePlot,
                'carbon_absorb' => $regionCarbonAbsorbPlot,
            ];
        }

        $regionJson = json_encode($regionData);

        return view('pages.index', [
            'regionalData' => $regionalData,
            'sumCarbonValuePlot' => $sumCarbonValuePlot,
            'sumCarbonAbsorbPlot' => $sumCarbonAbsorbPlot,
            'regionJson' => $regionJson,
            'seresah' => $seresah,
            'semai' => $semai,
            'tumbuhanBawah' => $tumbuhanBawah,
            'tiang' => $tiang,
            'pancang' => $pancang,
            'necromass' => $necromass,
            'pohon' => $pohon,
            'tanah' => $tanah,
        ]);
    }
}
