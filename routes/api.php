<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MedicoWithAuthController, PacienteWithAuthController, AuthController, CidadeController, MedicoController};

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

// include_once("auth.php");

Route::post('/login', [AuthController::class, 'login']);


Route::controller(CidadeController::class)->prefix('/cidades')
->group(function() {
    Route::get('/', 'listAll');
});

Route::controller(MedicoController::class)->prefix('/medicos')
->group(function() {
    Route::get('/', 'listAll');
});


//authenticated
Route::middleware('auth:jwt')->group(function () {
    
    Route::controller(MedicoWithAuthController::class)->group(function() {
        Route::get('/cidades/{id_cidade}/medicos', 'listMedicosByCidade');
        Route::get('/medicos/{id_medico}/pacientes', 'vinculatePaciente');
        Route::post('/medicos', 'create');
    });
    
    Route::controller(PacienteWithAuthController::class)->group(function() {
        Route::post('/pacientes', 'create');
        Route::put('/pacientes/{id_paciente}', 'update');
    });

});


