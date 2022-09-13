<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/registro', [UserController::class, 'store']);
Route::post('user/login', [UserController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::group(['middleware' => ['role:Jugador']], function () {

        Route::get('jugador/get', [UserController::class,'index']);
        Route::post('jugador/create', [JugadorController::class,'store']);
        Route::put('jugador/addItem', [JugadorController::class, 'update']);
        Route::get('jugador/atacar/{id}/{ataque}', [JugadorController::class, 'atacar']);
        Route::post('jugador/addInventario', [JugadorController::class, 'addInventario']);

    });

    Route::group(['middleware' => ['role:Administrador']], function () {
        Route::put('admin/activeJugador', [JugadorController::class, 'activar']);
        Route::put('admin/activeItem', [ItemController::class, 'activar']);
        Route::put('admin/Item', [ItemController::class, 'update']);
        Route::get('admin/ultis', [JugadorController::class, 'indexUlti']);
    });
});






