<?php

namespace App\Models\exames;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $table = 'exames';

    protected $fillable = [
        'nome',
        'descricao',
    ];
}
