<?php

use App\Http\Controllers\ClienteController;
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

Route::controller(ClienteController::class)->group(function () {
    Route::get('/clientes', 'index');
    Route::post('/cliente', 'insertCliente');
    Route::put('/clientes/{id}', 'update');
    Route::delete('/clientes/{id}', 'destroy');
});
