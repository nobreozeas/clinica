<?php

namespace App\Models\medicos;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //

    protected $table = 'medicos';

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
        'crm',
        'matricula',
        'salario'

    ];

}
