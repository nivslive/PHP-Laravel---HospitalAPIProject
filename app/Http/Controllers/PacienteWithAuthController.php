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
            return response()->json(['message' => 'Erro no preenchimento dos dados ao criar um médico'], 500);
        }

        $result->save();
        return response()->json(['message' => 'Você criou um paciente com sucesso!'], 200);
    }

        
    public function update(UpdatePacienteWithAuthRequest $request, $paciente_id) // : ResponseFactory | JsonResponse 
    {
        dump($request);
        // $paciente = Paciente::where('id', $paciente_id);
        // if(!$paciente) {
        //     return response()->json(['message' => 'Não há esse paciente cadastrado na base de dados!'], 404); 
        // }

        // $result = $paciente->update($request->except('_token'));

        // if (!$result) {
        //     return response()->json(['message' => 'Erro no preenchimento dos dados ao criar um médico'], 500);
        // }

        // return response()->json(['message' => 'Você criou um paciente com sucesso!'], 200);
    }

}
