<?php

namespace App\Models\pacientes;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cpf',
        'celular1',
        'celular2',
        'rg',
        'orgao_expedidor',
        'data_expedicao',
        'uf_expedicao',
        'etnia_id',
        'raca_id',
        'orientacao_sexual_id',
        'identidade_genero_id',
        'usuario_id',
    ];


}
