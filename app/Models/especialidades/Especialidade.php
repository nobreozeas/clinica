<?php

namespace App\Models\especialidades;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'especialidades';

    protected $fillable = [
        'nome',
    ];

}
