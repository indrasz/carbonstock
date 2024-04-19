<?php

namespace App\Http\Controllers\Client;

use App\Models\Zona;
use App\Models\Hamparan;
use App\Models\Regional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index (){

        $regional = Regional::all();
        $zona = Zona::all();
        $hamparan = Hamparan::all();

        return view('pages.index', [
            'regional' => $regional,
            'zona' => $zona,
            'hamparan' => $hamparan
        ]);

    }
}
