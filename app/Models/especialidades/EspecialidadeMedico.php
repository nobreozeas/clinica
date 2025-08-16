<?php

namespace App\Models\especialidades;

use Illuminate\Database\Eloquent\Model;

class EspecialidadeMedico extends Model
{

    protected $table = 'medicos_especialidades';

    protected $fillable = [
        'medico_id',
        'especialidade_id',
    ];
}
