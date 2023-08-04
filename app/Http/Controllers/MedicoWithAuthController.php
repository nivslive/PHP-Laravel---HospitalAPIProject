<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoWithAuthRequest;
use App\Http\Requests\VinculatePacienteMedicoWithAuthRequest;
use App\Models\Cidade;
use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Request;

class MedicoWithAuthController extends Controller
{

    public function create(CreateMedicoWithAuthRequest $request): ResponseFactory | JsonResponse {
        $cidade = Cidade::select('id')->where('id', $request->input('cidade_id'))->first();
        // caso gostaria que captasse a cidade pelo nome.
        //$cidade = Cidade::select('id')->where('nome', $request->input('cidade_id'))->first();
        if(!$cidade) {
            return response()->json(['message' => 'A cidade não existe.'], 500);  
        }

        $data = $request
                    ->merge(['cidade_id' => $cidade->id])
                    ->except('_token');

        
        $result = Medico::create($data);
        if (!$result) {
            return response()->json(['message' => 'Erro no preenchimento dos dados ao criar um médico'], 500);
        }

        
        $result->save();
        return response()->json(['message' => 'Você criou um médico com sucesso!', 'data' => $result], 200);
    }

    public function vinculatePaciente(VinculatePacienteMedicoWithAuthRequest $request, $medico_id): ResponseFactory | JsonResponse {
        
        if(!$request->has('paciente_id')) {
            return response()->json(['message' => 'Erro no dado enviado.'], 500);
        }

        $paciente_id =  $request->input('paciente_id');
        
        $medicoPaciente = MedicoPaciente::where('medico_id', $medico_id)
            ->where('paciente_id', $paciente_id)->first();

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

    public function pacientesList($medico_id) {

        $medico = Medico::find($medico_id);
        if (!$medico) {
            return response()->json(['error' => 'Médico não encontrado'], 404);
        }
        
        $pacientes = MedicoPaciente::where('medico_id', $medico_id)->get();

        return response()->json(['message' => 'Pacientes do médico:' . $medico->nome, 'data' => $pacientes], 200);
    }
}
