<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, CidadeController, MedicoController};

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

require_once("auth.php");

Route::post('login', [AuthController::class, 'show']);


Route::controller(CidadeController::class)->prefix('/cidades')
->group(function() {
    Route::get('/', 'listAll');
});

Route::controller(MedicoController::class)->prefix('/medicos')
->group(function() {
    Route::get('/', 'listAll');
});