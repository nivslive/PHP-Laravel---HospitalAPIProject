<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeWithAuthController extends Controller
{
    
    public function listMedicosByCidade(int $id_cidade)
    {
        return Cidade::find($id_cidade)->medicos()->get();
    }
}
