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

// Route::group(['prefix' => 'auth'], function () {

// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login/email', [AuthController::class, 'loginWithEmail'])->name('login.email');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/validateUser', [AuthController::class, 'validateUser'])->name('login.validateUser');
Route::post('/createUser', [AuthController::class, 'createUser'])->name('register.createUser');

// Route::group(["middleware" => ["auth", "verified"]], function () {
Route::middleware(['auth'])->group(
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/hamparan', [HamparanController::class, 'index'])->name('hamparan.index');
        Route::get('/hamparan/create/{id}', [HamparanController::class, 'create'])->name('hamparan.create');
        Route::get('/hamparan/show/{id}', [HamparanController::class, 'show'])->name('hamparan.show');
        Route::post('/hamparan/{id}', [HamparanController::class, 'destroy'])->name('hamparan.destroy');
        Route::post('/hamparan', [HamparanController::class, 'store'])->name('hamparan.store');

        Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
        Route::get('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
        Route::get('/periode', [PeriodeController::class, 'index'])->name('periode.index');
        Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');

        Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::get('/team/create/{id}', [TeamController::class, 'create'])->name('team.create');
        Route::get('/team', [TeamController::class, 'index'])->name('team.index');
        Route::post('/team', [TeamController::class, 'store'])->name('team.store');
        Route::post('/team/tambahAnggota', [TeamController::class, 'tambahAnggota'])->name('team.tambahAnggota');
        Route::post('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

        Route::get('/regional/show/{id}', [RegionController::class, 'show'])->name('region.show');
        Route::get('/regional/create', [RegionController::class, 'create'])->name('region.create');
        Route::get('/regional', [RegionController::class, 'index'])->name('region.index');
        Route::post('/regional', [RegionController::class, 'store'])->name('region.store');
        Route::post('/regional/{id}', [RegionController::class, 'destroy'])->name('region.destroy');
        Route::POST('/region/tambahTim', [RegionController::class, 'storeTeam'])->name('region.tambahTim');

        Route::get('/zona/edit/{id}', [ZonaController::class, 'edit'])->name('zona.edit');
        Route::get('/zona/show/{id}', [ZonaController::class, 'show'])->name('zona.show');
        Route::get('/zona/create/{id}', [ZonaController::class, 'create'])->name('zona.create');
        Route::get('/zona', [ZonaController::class, 'index'])->name('zona.index');
        Route::post('/zona', [ZonaController::class, 'store'])->name('zona.store');
        Route::post('/zona/tambahTim', [ZonaController::class, 'tambahTim'])->name('zona.tambahTim');
        Route::post('/zona/{id}', [ZonaController::class, 'destroy'])->name('zona.destroy');

        Route::get('/plot-area/edit/{id}', [PlotAreaController::class, 'edit'])->name('plot-area.edit');
        Route::get('/plot-area/show/{id}', [PlotAreaController::class, 'show'])->name('plot-area.show');
        Route::get('/plot-area/create/{id}', [PlotAreaController::class, 'create'])->name('plot-area.create');
        Route::get('/plot-area', [PlotAreaController::class, 'index'])->name('plot-area.index');
        Route::post('/plot-area', [PlotAreaController::class, 'store'])->name('plot-area.store');
        Route::post('/plot-area/{id}', [PlotAreaController::class, 'destroy'])->name('plot-area.destroy');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    }
);

// });
