<?php

namespace App\Http\Controllers\orientacoes_sexuais;

use App\Http\Controllers\Controller;
use App\Models\orientacoes_sexuais\OrientacaoSexual;
use Illuminate\Http\Request;

class OrientacaoSexualController extends Controller
{
    public function listarOrientacaoSexual(){

        return OrientacaoSexual::all();

    }
}
