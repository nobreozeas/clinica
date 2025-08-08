<?php

namespace App\Models\identidades_generos;

use Illuminate\Database\Eloquent\Model;

class IdentidadeGenero extends Model
{
    protected $table = 'identidades_generos';

    protected $fillable = [
        'nome',
    ];

}
