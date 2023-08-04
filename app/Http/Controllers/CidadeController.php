<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\Collection;

class CidadeController extends Controller
{
    public function listAll(): Collection {
        return Cidade::all();
    }
    public function listMedicosByCidade(int $id_cidade): Collection
    {
        return Cidade::find($id_cidade)->medicos()->get();
    }
}
