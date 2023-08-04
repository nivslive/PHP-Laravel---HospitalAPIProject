<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function login(AuthLoginRequest $request): JsonResponse | Response
    {

        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = auth()->fromUser($user);

        return response()->json(['message' => 'Logado com sucesso! Coloque seu token no Header -> Authorization: Bearer {token}', 'token' => $token, 'copie_e_cole_em_authorization' => "Bearer {$token}"]);
    }

    public function user() {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }
}
