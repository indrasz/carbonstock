<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{

    public function index()
    {
        return view('pages.periode.index');

    }
    public function create()
    {
        return view('pages.periode.create');
    }

    public function store(Request $request)
    {
        //
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
