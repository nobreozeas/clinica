<?php

namespace App\Models\medicamentos;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $table = 'medicamentos';

    protected $fillable = [
        'nome',
        'tipo_medicamento_id'
    ];
}
