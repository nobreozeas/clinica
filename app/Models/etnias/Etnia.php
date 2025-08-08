<?php

namespace App\Models\etnias;

use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    protected $table = 'etnias';

    protected $fillable = [
        'nome',
    ];
}
