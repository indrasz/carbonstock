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

        $regional = Regional::with([
            'zona.hamparan.plot.subplotA',
            'zona.hamparan.plot.subplotASemai',
            'zona.hamparan.plot.subplotASeresah',
            'zona.hamparan.plot.subplotATumbuhanBawah',
            'zona.hamparan.plot.subplotB',
            'zona.hamparan.plot.subplotC',
            'zona.hamparan.plot.subplotD',
            'zona.hamparan.plot.subplotDNekromas',
            'zona.hamparan.plot.subplotDTanah',
            'zona.hamparan.plot.subplotDPohon'
        ])->get();


        $seresah = SubplotASeresah::all();
        $semai = SubplotASemai::all();
        $tumbuhanBawah = SubplotATumbuhanBawah::all();

        $tiang = SubplotB::all();
        $pancang = SubplotC::all();

        $necromass = SubplotDNekromas::all();
        $pohon = SubplotDPohon::all();
        $tanah = SubplotDTanah::all();

        $avgAllCarbonValueSemai = $semai->avg('carbon_value');
        $avgAllCarbonAbsorbSemai = $semai->avg('carbon_absorb');
        $avgAllCarbonValueSeresah = $seresah->avg('carbon_value');
        $avgAllCarbonAbsorbSeresah = $seresah->avg('carbon_absorb');
        $avgAllCarbonValueTumbuhanBawah = $tumbuhanBawah->avg('carbon_value');
        $avgAllCarbonAbsorbTumbuhanBawah = $tumbuhanBawah->avg('carbon_absorb');
        $avgAllCarbonValueSubplotB = $tiang->avg('carbon_value');
        $avgAllCarbonAbsorbSubplotB = $tiang->avg('carbon_absorb');
        $avgAllCarbonValueSubplotC = $pancang->avg('carbon_value');
        $avgAllCarbonAbsorbSubplotC = $pancang->avg('carbon_absorb');
        $avgAllCarbonValueNekromas = $necromass->avg('carbon_value');
        $avgAllCarbonAbsorbNekromas = $necromass->avg('carbon_absorb');
        $avgAllCarbonValuePohon = $pohon->avg('carbon_value');
        $avgAllCarbonAbsorbPohon = $pohon->avg('carbon_absorb');
        $avgAllCarbonValueTanah = $tanah->avg('carbon_value');
        $avgAllCarbonAbsorbTanah = $tanah->avg('carbon_absorb');

        $sumCarbonValuePlot = 0;
        $sumCarbonAbsorbPlot = 0;

        $regionalCarbonValues = [];
        $regionalCarbonAbsorbs = [];

        foreach ($regional as $reg) {

            $regionalCarbonValue = 0;
            $regionalCarbonAbsorb = 0;
            $totalPlots = 0;

            foreach ($reg->zona as $zona) {
                foreach ($zona->hamparan as $hamparan) {
                    foreach ($hamparan->plot as $plot) {
                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Semai
                        $allSubplotASemaiPlot = SubplotASemai::where('plot_id', $plot->id)->get();
                        $avgCarbonValueSemai = $allSubplotASemaiPlot->avg('carbon_value');
                        $avgCarbonAbsorbSemai = $allSubplotASemaiPlot->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Seresah
                        $allSubplotASeresahPlot = SubplotASeresah::where('plot_id', $plot->id)->get();
                        $avgCarbonValueSeresah = $allSubplotASeresahPlot->avg('carbon_value');
                        $avgCarbonAbsorbSeresah = $allSubplotASeresahPlot->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Tumbuhan Bawah
                        $allSubplotATumbuhanBawahPlot = SubplotATumbuhanBawah::where('plot_id', $plot->id)->get();
                        $avgCarbonValueTumbuhanBawah = $allSubplotATumbuhanBawahPlot->avg('carbon_value');
                        $avgCarbonAbsorbTumbuhanBawah = $allSubplotATumbuhanBawahPlot->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Tumbuhan Bawah
                        $allSubplotB = SubplotB::where('plot_id', $plot->id)->get();
                        $avgCarbonValueSubplotB = $allSubplotB->avg('carbon_value');
                        $avgCarbonAbsorbSubplotB = $allSubplotB->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Tumbuhan Bawah
                        $allSubplotC = SubplotC::where('plot_id', $plot->id)->get();
                        $avgCarbonValueSubplotC = $allSubplotC->avg('carbon_value');
                        $avgCarbonAbsorbSubplotC = $allSubplotC->avg('carbon_absorb');

                        $allSubplotDNekromasPlot = SubplotDNekromas::where('plot_id', $plot->id)->get();
                        $avgCarbonValueNekromas = $allSubplotDNekromasPlot->avg('carbon_value');
                        $avgCarbonAbsorbNekromas = $allSubplotDNekromasPlot->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Seresah
                        $allSubplotDPohonPlot = SubplotDPohon::where('plot_id', $plot->id)->get();
                        $avgCarbonValuePohon = $allSubplotDPohonPlot->avg('carbon_value');
                        $avgCarbonAbsorbPohon = $allSubplotDPohonPlot->avg('carbon_absorb');

                        // Hitung rata-rata carbon_value dan carbon_absorb untuk setiap plot subplotA Tumbuhan Bawah
                        $allSubplotDTanahPlot = SubplotDTanah::where('plot_id', $plot->id)->get();
                        $avgCarbonValueTanah = $allSubplotDTanahPlot->avg('carbon_value');
                        $avgCarbonAbsorbTanah = $allSubplotDTanahPlot->avg('carbon_absorb');

                        // Hitung rata-rata keseluruhan untuk plot
                        $sumCarbonValuePlot += ($avgCarbonValueSemai + $avgCarbonValueSeresah + $avgCarbonValueTumbuhanBawah + $avgCarbonValueSubplotB + $avgCarbonValueSubplotC + $avgCarbonValueNekromas + $avgCarbonValuePohon + $avgCarbonValueTanah);
                        $sumCarbonAbsorbPlot += ($avgCarbonAbsorbSemai + $avgCarbonAbsorbSeresah + $avgCarbonAbsorbTumbuhanBawah + +$avgCarbonAbsorbSubplotB + $avgCarbonAbsorbSubplotC + $avgCarbonAbsorbNekromas + $avgCarbonAbsorbPohon + $avgCarbonAbsorbTanah);

                        $regionalCarbonValue += ($avgCarbonValueSemai + $avgCarbonValueSeresah + $avgCarbonValueTumbuhanBawah + $avgCarbonValueSubplotB + $avgCarbonValueSubplotC + $avgCarbonValueNekromas + $avgCarbonValuePohon + $avgCarbonValueTanah);
                        $regionalCarbonAbsorb += ($avgCarbonAbsorbSemai + $avgCarbonAbsorbSeresah + $avgCarbonAbsorbTumbuhanBawah + +$avgCarbonAbsorbSubplotB + $avgCarbonAbsorbSubplotC + $avgCarbonAbsorbNekromas + $avgCarbonAbsorbPohon + $avgCarbonAbsorbTanah);
                        $totalPlots++;
                    }
                }
            }

            $regionalCarbonValues[$reg->nama_regional] = $regionalCarbonValue;
            $regionalCarbonAbsorbs[$reg->nama_regional] = $regionalCarbonAbsorb;
        }

        // dd($regionalCarbonValues, $regionalCarbonAbsorbs, $sumCarbonValuePlot, $sumCarbonAbsorbPlot);


        return view('pages.index', [
            'regional' => $regional,
            'sumCarbonValuePlot' => $sumCarbonValuePlot,
            'sumCarbonAbsorbPlot' => $sumCarbonAbsorbPlot,
            'regionalCarbonValues' => $regionalCarbonValues,
            'regionalCarbonAbsorbs' => $regionalCarbonAbsorbs,
            'seresah' => $seresah,
            'semai' => $semai,
            'tumbuhanBawah' => $tumbuhanBawah,
            'tiang' => $tiang,
            'pancang' => $pancang,
            'necromass' => $necromass,
            'pohon' => $pohon,
            'tanah' => $tanah,
            'avgCarbonValueSemai' => $avgCarbonValueSemai,
            'avgCarbonAbsorbSemai' => $avgCarbonAbsorbSemai,
            'avgCarbonValueSeresah' => $avgCarbonValueSeresah,
            'avgCarbonAbsorbSeresah' => $avgCarbonAbsorbSeresah,
            'avgCarbonValueTumbuhanBawah' => $avgCarbonValueTumbuhanBawah,
            'avgCarbonAbsorbTumbuhanBawah' => $avgCarbonAbsorbTumbuhanBawah,
            'avgCarbonValueSubplotB' => $avgCarbonValueSubplotB,
            'avgCarbonAbsorbSubplotB' => $avgCarbonAbsorbSubplotB,
            'avgCarbonValueSubplotC' => $avgCarbonValueSubplotC,
            'avgCarbonAbsorbSubplotC' => $avgCarbonAbsorbSubplotC,
            'avgCarbonValueNekromas' => $avgCarbonValueNekromas,
            'avgCarbonAbsorbNekromas' => $avgCarbonAbsorbNekromas,
            'avgCarbonValuePohon' => $avgCarbonValuePohon,
            'avgCarbonAbsorbPohon' => $avgCarbonAbsorbPohon,
            'avgCarbonValueTanah' => $avgCarbonValueTanah,
            'avgCarbonAbsorbTanah' => $avgCarbonAbsorbTanah,
            'avgAllCarbonValueSemai' => $avgAllCarbonValueSemai,
            'avgAllCarbonAbsorbSemai' => $avgAllCarbonAbsorbSemai,
            'avgAllCarbonValueSeresah' => $avgAllCarbonValueSeresah,
            'avgAllCarbonAbsorbSeresah' => $avgAllCarbonAbsorbSeresah,
            'avgAllCarbonValueTumbuhanBawah' => $avgAllCarbonValueTumbuhanBawah,
            'avgAllCarbonAbsorbTumbuhanBawah' => $avgAllCarbonAbsorbTumbuhanBawah,
            'avgAllCarbonValueSubplotB' => $avgAllCarbonValueSubplotB,
            'avgAllCarbonAbsorbSubplotB' => $avgAllCarbonAbsorbSubplotB,
            'avgAllCarbonValueSubplotC' => $avgAllCarbonValueSubplotC,
            'avgAllCarbonAbsorbSubplotC' => $avgAllCarbonAbsorbSubplotC,
            'avgAllCarbonValueNekromas' => $avgAllCarbonValueNekromas,
            'avgAllCarbonAbsorbNekromas' => $avgAllCarbonAbsorbNekromas,
            'avgAllCarbonValuePohon' => $avgAllCarbonValuePohon,
            'avgAllCarbonAbsorbPohon' => $avgAllCarbonAbsorbPohon,
            'avgAllCarbonValueTanah' => $avgAllCarbonValueTanah,
            'avgAllCarbonAbsorbTanah' => $avgAllCarbonAbsorbTanah,
        ]);
    }
}
