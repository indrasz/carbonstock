<?php

use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\HamparanController;
use App\Http\Controllers\Client\PeriodeController;
use App\Http\Controllers\Client\PlotAreaController;
use App\Http\Controllers\Client\RegionController;
use App\Http\Controllers\Client\TeamController;
use App\Http\Controllers\Client\ZonaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/', [ZonaController::class, 'index'])->name('zona');
Route::resource("zona", ZonaController::class);
Route::resource("plot-area", PlotAreaController::class);
Route::resource("periode", PeriodeController::class);
Route::resource("hamparan", HamparanController::class);
Route::resource("team", TeamController::class);
Route::resource("region", RegionController::class);
