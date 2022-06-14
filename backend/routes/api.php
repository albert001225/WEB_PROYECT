<?php

use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ProductoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::controller(ClienteController::class)->group(function () {
//     Route::get('/clientes', 'index');
//     Route::post('/cliente', 'insertCliente');
//     Route::put('/clientes/{id}', 'update');
//     Route::delete('/clientes/{id}', 'destroy');
// });


Route::controller(ClienteController::class)->group(function () {
    Route::get('/cliente', 'index');
    Route::post('/cliente', 'insert');
    Route::put('/cliente/{id}', 'update');
    Route::delete('/cliente/{id}', 'destroy');
    Route::get('/cliente/{id}', 'show');
});

Route::controller(ProductoController::class)->group(function () {
    Route::get('/productos', 'index');
    Route::post('/producto', 'insert');
    Route::put('/producto/{id}', 'update');
    Route::delete('/producto/{id}', 'destroy');
    Route::get('/producto/{id}', 'show');
});
