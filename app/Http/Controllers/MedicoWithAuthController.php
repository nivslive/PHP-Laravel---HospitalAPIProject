<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoWithAuthRequest;
use App\Models\Cidade;
use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
// use Illuminate\Http\Request;

class MedicoWithAuthController extends Controller
{
    public function create(CreateMedicoWithAuthRequest $request): ResponseFactory | Response {
        $result = Medico::create($request);
        if (!$result) {
            return response()->json(['message' => 'Erro ao criar um médico'], 500);
        }

        return response()->json(['message' => 'Você criou um médico com sucesso!'], 200);
    }

    public function listMedicosByCidade(int $id_cidade)
    {
        return Cidade::find($id_cidade)->medicos()->get();
    }

    public function vinculatePaciente(Request $request, $medico_id): ResponseFactory | Response {
        if(!$request->has('paciente_id')) {
            return response()->json(['message' => 'Erro no dado enviado.'], 500);
        }

        $paciente_id =  $request->input('paciente_id');
        
        $medicoPaciente = MedicoPaciente::where('medico_id', $medico_id)
            ->where('paciente_id', $paciente_id);

        if($medicoPaciente) {
            return response()->json(['message' => 'Já existe registro com esse paciente.'], 500);
        }

        $medicoPacienteCreated = MedicoPaciente::create([
            'medico_id' => $medico_id,
            'paciente_id' => $paciente_id
        ]);

        if(!$medicoPacienteCreated) {
            return response()->json(['message' => 'Erro ao criar vinculo de paciente com médico.'], 500); 
        }
        $medico = Medico::find($medico_id);
        $paciente = Paciente::find($paciente_id);
        $data = [
                'medico' => $medico,
                'paciente' => $paciente,  
        ];

        return response()
            ->json(
            [
                'message' => "Você criou um vinculo com o paciente e o médico com sucesso!",
                'data' => $data
            ]
            , 200);
    }
}
