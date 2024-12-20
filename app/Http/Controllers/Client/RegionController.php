<?php

namespace App\Http\Controllers\Client;

use Exception;
use App\Models\Tim;
use App\Models\Periode;
use App\Models\Regional;
use App\Models\SubplotB;
use App\Models\SubplotC;
use App\Models\MasterHutan;
use App\Models\RegionalTim;
use Illuminate\Http\Request;
use App\Models\SubplotASemai;
use App\Models\SubplotDPohon;
use App\Models\SubplotDTanah;
use App\Models\SubplotASeresah;
use App\Models\SubplotDNekromas;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\SubplotATumbuhanBawah;
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
        $regional = Regional::with([
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
        ])->findOrFail($id);

        //get average carbon value and carbon absorb
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

        $sumCarbonValuePlot = (float)$valueCVSemai + (float)$valueCVSeresah + (float)$totalAvgCVSubplotB + (float)$totalAvgCVSubplotC + (float)$valueCVNekromas + (float)$totalAvgCVSubplotPohon + (float)$totalCVTanah;
        $sumCarbonAbsorbPlot = (float)$valueCASemai + (float)$valueCASeresah  + (float)$totalAvgCASubplotB + (float)$totalAvgCASubplotC + (float)$totalAvgCASubplotPohon;

        foreach ($regional->zona as $z) {
            $dir_files = public_path('zona_' . $z->id);
            $files = [];

            if (is_dir($dir_files)) {
                $list_files = scandir($dir_files);
                array_shift($list_files); // Remove '.' from the list
                array_shift($list_files); // Remove '..' from the list

                foreach ($list_files as $file) {
                    $files[] = [
                        'nama_file' => $file,
                        'path' => 'zona_' . $z->id . '/' . $file
                    ];
                }
            }

            $z->files = $files;
        }

        return view('pages.region.show', [
            'regional' => $regional,
            'regionalId' => $id,
            'valueCVSeresah' => $valueCVSeresah,
            'valueCASeresah' => $valueCASeresah,
            'valueCVSemai' => $valueCVSemai,
            'valueCASemai'=> $valueCASemai,
            'valueCVTumbuhanBawah'=> $valueCVTumbuhanBawah,
            'valueCATumbuhanBawah' => $valueCATumbuhanBawah,
            'totalAvgCVSubplotB' => $totalAvgCVSubplotB,
            'totalAvgCASubplotB' => $totalAvgCASubplotB,
            'totalAvgCVSubplotC' => $totalAvgCVSubplotC,
            'totalAvgCASubplotC' => $totalAvgCASubplotC,
            'valueCVNekromas' => $valueCVNekromas,
            'valueCANekromas' => $valueCANekromas,
            'totalAvgCVSubplotPohon' => $totalAvgCVSubplotPohon,
            'totalAvgCASubplotPohon' => $totalAvgCASubplotPohon,
            'totalCVTanah' => $totalCVTanah,
            'totalCATanah' => $totalCATanah,
            'sumCarbonValuePlot' => $sumCarbonValuePlot,
            'sumCarbonAbsorbPlot' => $sumCarbonAbsorbPlot,
        ]);
    }

    public function edit(string $id)
    {
        $regional = Regional::findOrFail($id);
        $masterHutan = MasterHutan::all();
        $periode = Periode::all();

        return view('pages.region.edit', [
            'regional' => $regional,
            'masterHutan' => $masterHutan,
            'periode' => $periode,
        ]);
    }


    public function update(RegionRequest $request, $id)
    {
        $regional = Regional::findOrFail($id);

        $data = $request->all();
        $regional->update($data);

        return redirect()->route('region.index');
    }

    public function addteam($id)
    {
        $tim = Tim::all();
        return view('pages.region.addTeam', [
            'tim' => $tim,
            'id' => $id
        ]);
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
        try {
            $region = Regional::findorFail($id);
            $region->delete();

            toastr()->success('Zona berhasil dihapus.');
        } catch (Exception $e) {
            toastr()->error('Gagal menghapus lokasi. Silakan coba lagi.');
        }

        return redirect()->route('region.index');
    }
}
