<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return Paciente::create($request);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdatePacienteRequest $request, Paciente $paciente): ResponseFactory | JsonResponse
    // {
    //     $update = $paciente->fill($request->toArray())->update();

    //     if(!$update) {
    //         return response()->json(['message' => 'Erro ao atualizar paciente.'], 500);
    //     }

    //     return response()->json(['message' => 'Sucesso ao atualizar paciente.'], 200);
    // }
}
