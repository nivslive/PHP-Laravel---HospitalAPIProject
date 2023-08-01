<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMedicoWithAuthRequest;
use App\Models\Medico;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Client\Response;
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
}
