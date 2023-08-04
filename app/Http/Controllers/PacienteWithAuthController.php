<?php

namespace App\Http\Controllers;

use App\Http\Requests\{CreatePacienteWithAuthRequest, UpdatePacienteWithAuthRequest};
use App\Models\Paciente;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;

class PacienteWithAuthController extends Controller
{
    
    public function create(CreatePacienteWithAuthRequest $request): ResponseFactory | JsonResponse {

        $data = $request
                    ->except('_token');

        $result = Paciente::create($data);
        if (!$result) {
            return response()->json(['message' => 'Erro no preenchimento dos dados ao criar um paciente.'], 500);
        }

        $result->save();
        return response()->json(['message' => 'Você criou um paciente com sucesso!', 'data' => $result], 200);
    }

        
    public function update(UpdatePacienteWithAuthRequest $request, $paciente_id)
    {
        $paciente = Paciente::find($paciente_id);

        if (!$paciente) {
            return response()->json(['message' => 'Não há esse paciente cadastrado na base de dados!'], 404);
        }

        if ($request->has('celular')) {
            $paciente->celular = $request->input('celular');
        }

        if ($request->has('cpf')) {
            $paciente->cpf = $request->input('cpf');
        }

        if ($request->has('nome')) {
            $paciente->nome = $request->input('nome');
        }

        $result = $paciente->save();

        if (!$result) {
            return response()->json(['message' => 'Erro no preenchimento dos dados ao atualizar o paciente'], 500);
        }


        $updatedPaciente = Paciente::find($paciente_id);

        return response()->json(['message' => 'Você atualizou o paciente com sucesso!', 'data' => $updatedPaciente], 200);
    }


}
