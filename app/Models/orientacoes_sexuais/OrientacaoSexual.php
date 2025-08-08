<?php

namespace App\Models\orientacoes_sexuais;

use Illuminate\Database\Eloquent\Model;

class OrientacaoSexual extends Model
{
    protected $table = 'orientacoes_sexuais';

    protected $fillable = [
        'nome',
    ];

    // Additional methods or relationships can be defined here
}
