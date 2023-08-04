<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
class AuthController extends Controller
{

    private $acceptHeader;

    public function __construct(Request $request) {
        $this->acceptHeader = $request->header('Accept');
    }
    public function login(AuthLoginRequest $request): JsonResponse | Response
    {

        if($this->acceptHeader !== "application/json") {
            return response()->json(['message' => 'A requisição deve aceitar application/json (Em header, coloque no Accept: application/json)']);
        }

        $credentials = $request->only('email', 'password');

        if (!auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $user = User::where('email', $request->email)->first();
        $token = auth()->fromUser($user);

        return response()->json(['message' => 'Coloque seu token', 'token' => $token]);
    }
}
