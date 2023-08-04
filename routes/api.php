<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{MedicoWithAuthController, PacienteWithAuthController, CidadeWithAuthController, AuthController, CidadeController, MedicoController};

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
Route::prefix('/login')->group(function(){
    Route::get('/', function() {
        return response()->json(['message' => "Você precisa se logar. Para se logar, faça uma requisição POST para /login, com o email e a senha no corpo da requisição."], 300);
    })->name('login');

});

Route::controller(CidadeController::class)->prefix('/cidades')
->group(function() {
    Route::get('/', 'listAll');
});

Route::controller(MedicoController::class)->prefix('/medicos')
->group(function() {
    Route::get('/', 'listAll');
});


Route::controller(CidadeController::class)->prefix('/cidades')->group(function() {
    Route::get('/{id_cidade}/medicos', 'listMedicosByCidade');
});


//authenticated
Route::middleware('auth:jwt')->group(function () {
    
    Route::get('/user', [AuthController::class, 'user']);

    Route::controller(MedicoWithAuthController::class)->prefix('/medicos')->group(function() {
        Route::post('/{id_medico}/pacientes', 'vinculatePaciente');
        Route::get('/{id_medico}/pacientes', 'pacientesList');
        Route::post('/', 'create');
    });

    // Route::controller(CidadeWithAuthController::class)->prefix('/cidades')->group(function() {
    //     Route::get('/{id_cidade}/medicos', 'listMedicosByCidade');
    // });
    
    Route::controller(PacienteWithAuthController::class)->prefix('/pacientes')->group(function() {
        Route::post('/', 'create');
        Route::put('/{id_paciente}', 'update');
    });

});


Route::fallback(function () {
    return response()->json(['message' => 'Rota não encontrada.'], 404);
});