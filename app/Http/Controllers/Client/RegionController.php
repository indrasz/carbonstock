<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\MasterHutan;
use App\Models\Regional;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function index()
    {
        $regional = Regional::with('type_hutan')->get();

        return view('pages.region.index', [
            'regional' => $regional,
        ]);
    }


    public function create()
    {
        $masterHutan = MasterHutan::all();
        return view('pages.region.create', [
            'masterHutan' => $masterHutan
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

    public function destroy(string $id)
    {
        //
    }
}
