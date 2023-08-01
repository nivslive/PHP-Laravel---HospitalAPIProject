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
}
