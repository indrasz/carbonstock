<?php

use App\Http\Controllers\Api\HamparanController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\MasterController;
use App\Http\Controllers\Api\PeriodeController;
use App\Http\Controllers\Api\PlotController;
use App\Http\Controllers\Api\RegionalController;
use App\Http\Controllers\Api\SubPlotController;
use App\Http\Controllers\Api\TimController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ZonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function() {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'addUser']);
});

Route::prefix('admin')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/listUser', [UserController::class, 'getUser']);
        Route::put('/setActive/{idUser}', [UserController::class, 'setActiveUser']);
        Route::delete('/delete/{idUser}', [UserController::class, 'deleteUser']);
    });

    Route::prefix('tim')->group(function(){
        Route::get('list', [TimController::class, 'get']);
        Route::post('add', [TimController::class, 'add']);
        Route::delete('delete/{id}', [TimController::class, 'delete']);
        Route::put('edit/{id}', [TimController::class, 'edit']);

        Route::get('list-anggota/{idTim}', [TimController::class, 'getAnggotaTim']);
        Route::post('add-anggota', [TimController::class, 'addAnggotaTim']);
        Route::delete('delete-anggota/{id_tim}/{id_user}', [TimController::class, 'deleteAnggotaTim']);
    });

    Route::prefix('periode')->group(function(){
        Route::get('/', [PeriodeController::class, 'get']);
        Route::post('/add', [PeriodeController::class, 'add']);
        Route::put('edit/{id_periode}', [PeriodeController::class, 'edit']);
        Route::delete('/delete/{id_periode}', [PeriodeController::class, 'delete']);
    });

    Route::prefix('regional')->group(function(){
        Route::get('/', [RegionalController::class, 'get']);
        Route::post('add', [RegionalController::class, 'add']);
        Route::put('edit/{id}', [RegionalController::class, 'edit']);
        Route::delete('delete/{id}', [RegionalController::class, 'delete']);

        Route::prefix('list-tim')->group(function(){
            Route::post('/add', [RegionalController::class, 'add_tim']);
            Route::delete('/{id_regional}/{id_tim}', [RegionalController::class, 'delete_tim']);
        });
    });

    Route::prefix('zona')->group(function(){
        Route::get('/list-zona', [ZonaController::class, 'get']);
        Route::post('/add', [ZonaController::class, 'add']);
        Route::delete('/delete/{id_regional}/{id_zona}', [ZonaController::class, 'delete']);

        Route::prefix('list-tim')->group(function(){
            Route::post('/add', [ZonaController::class, 'add_tim']);
            Route::delete('/{id_zona}/{id_tim}', [ZonaController::class, 'delete_tim']);
        });

        Route::prefix('files')->group(function(){
            Route::post('add/{id_zona}', [ZonaController::class, 'add_photo']);
            Route::delete('delete/{id_zona}/{nama_file}', [ZonaController::class, 'delete_photo']);
        });
    });

    Route::prefix('hamparan')->group(function(){
        Route::get('/', [HamparanController::class, 'get']);
        Route::post('/add', [HamparanController::class, 'add']);
        Route::put('/edit/{id_hamparan}', [HamparanController::class, 'edit']);
        Route::delete('/{id_zona}/{id_hamparan}', [HamparanController::class, 'delete']);
    });

    Route::prefix('plot')->group(function(){
        Route::get('/', [PlotController::class, 'get']);
        Route::post('add', [PlotController::class, 'add']);
        Route::put('edit/{id_plot}', [PlotController::class, 'edit']);
        Route::delete('/{id_hamparan}/{id_plot}', [PlotController::class, 'delete']);
    });

    Route::prefix('subplot')->group(function(){
        Route::get('/', [SubPlotController::class, 'get']);
        Route::post('add', [SubPlotController::class, 'add']);
        Route::put('edit/{id_subplot}', [SubPlotController::class, 'edit']);
        Route::delete('/{id_plot}/{id_subplot}', [SubPlotController::class, 'delete']);
    });
});

Route::prefix('master')->group(function(){
    Route::get('jenis-hutan', [MasterController::class, 'getHutan']);
    Route::get('plot', [MasterController::class, 'plot']);
});

Route::prefix('laporan')->group(function(){
    Route::get('semai', [LaporanController::class, 'get_semai']);
    Route::post('add-semai', [LaporanController::class, 'add_semai']);
    Route::delete('delete-semai/{id_subplot}/{id_semai}', [LaporanController::class, 'delete_semai']);
});
