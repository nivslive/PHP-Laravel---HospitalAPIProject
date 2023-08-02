<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoPaciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico_id', 'paciente_id'
    ];

    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'id', 'paciente_id');
    }

    public function medico()
    {
        return $this->hasOne(Medico::class, 'id', 'medico_id');
    }
}
