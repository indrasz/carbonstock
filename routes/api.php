<?php

use App\Http\Controllers\Api\TimController;
use App\Http\Controllers\Api\UserController;
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
    });
});
