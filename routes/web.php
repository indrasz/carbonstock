<?php

use App\Http\Controllers\Client\AuthController;
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
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/login/email', [AuthController::class, 'loginWithEmail'])->name('login.email');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/validateUser', [AuthController::class, 'login'])->name('login.validateUser');
    Route::get('/createUser', [AuthController::class, 'createUser'])->name('register.createUser');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource("plot-area", PlotAreaController::class);

Route::get('/hamparan', [HamparanController::class, 'index'])->name('hamparan.index');
Route::get('/hamparan/create', [HamparanController::class, 'create'])->name('hamparan.create');
Route::post('/hamparan/{id}', [HamparanController::class, 'destroy'])->name('hamparan.destroy');
Route::post('/hamparan', [HamparanController::class, 'store'])->name('hamparan.store');

Route::resource("team", TeamController::class);
Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');

Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::post('/team', [TeamController::class, 'store'])->name('team.store');
Route::post('/team/tambahAnggota', [TeamController::class, 'tambahAnggota'])->name('team.tambahAnggota');
Route::post('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

Route::get('/regional/edit/{id}', [RegionController::class, 'edit'])->name('region.edit');
Route::get('/regional/create', [RegionController::class, 'create'])->name('region.create');
Route::get('/regional', [RegionController::class, 'index'])->name('region.index');
Route::post('/regional', [RegionController::class, 'store'])->name('region.store');
Route::post('/regional/{id}', [RegionController::class, 'destroy'])->name('region.destroy');

Route::get('/zona/edit/{id}', [ZonaController::class, 'edit'])->name('zona.edit');
Route::get('/zona/create', [ZonaController::class, 'create'])->name('zona.create');
Route::get('/zona', [ZonaController::class, 'index'])->name('zona.index');
Route::post('/zona', [ZonaController::class, 'store'])->name('zona.store');
Route::post('/zona/tambahTim', [ZonaController::class, 'tambahTim'])->name('zona.tambahTim');
Route::post('/zona/{id}', [ZonaController::class, 'destroy'])->name('zona.destroy');
