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
// Route::resource("zona", ZonaController::class);

Route::resource("plot-area", PlotAreaController::class);

// Route::resource("periode", PeriodeController::class);

Route::get('/hamparan', [HamparanController::class, 'index'])->name('hamparan.index');

Route::resource("team", TeamController::class);

// Route::resource("region", RegionController::class);


Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');

Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::post('/team', [TeamController::class, 'store'])->name('team.store');
Route::post('/tambahAnggota', [TeamController::class, 'tambahAnggota'])->name('team.tambahAnggota');

Route::get('/regional/edit/{id}', [RegionController::class, 'edit'])->name('region.edit');
Route::get('/regional/create', [RegionController::class, 'create'])->name('region.create');
Route::get('/regional', [RegionController::class, 'index'])->name('region.index');
Route::post('/regional', [RegionController::class, 'store'])->name('region.store');
Route::post('/regional/{id}', [RegionController::class, 'destroy'])->name('region.destroy');

Route::get('/zona/edit/{id}', [ZonaController::class, 'edit'])->name('zona.edit');
Route::get('/zona/create', [ZonaController::class, 'create'])->name('zona.create');
Route::get('/zona', [ZonaController::class, 'index'])->name('zona.index');
Route::post('/zona', [ZonaController::class, 'store'])->name('zona.store');
Route::post('/tambahAnggota', [ZonaController::class, 'tambahAnggota'])->name('zona.tambahAnggota');
