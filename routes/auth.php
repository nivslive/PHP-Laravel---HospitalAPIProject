<?php
use App\Http\Controllers\{MedicoWithAuthController, PacienteWithAuthController};

Route::group([
    'middleware' => 'auth',
], function () {
    
    Route::controller(MedicoWithAuthController::class)->prefix('/cidades')
    ->group(function() {
        Route::get('cidades/{id_cidade}/medicos', 'listMedicosByCidade');
        Route::get('medicos/{id_medico}/pacientes', 'vinculatePaciente');
        Route::post('/medicos', 'create');
    });
    
    Route::controller(PacienteWithAuthController::class)->group(function() {
        Route::get('/medicos/{id_medico}/pacientes', 'listPacienteByMedico');
        Route::post('/pacientes', 'create');
        Route::put('/pacientes/{id_paciente}', 'update');
    });

    Route::get('/pacientes', 'UserController@addNewPaciente')->name('add-new-paciente');
});