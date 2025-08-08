<?php

namespace App\Models\racas;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    protected $table = 'racas';

    protected $fillable = [
        'nome',
    ];

    // Additional methods or relationships can be defined here
}
