<?php

namespace App\Http\Controllers\identidades_generos;

use App\Http\Controllers\Controller;
use App\Models\identidades_generos\IdentidadeGenero;
use Illuminate\Http\Request;

class IdentidadeGeneroController extends Controller
{
    public function listarIdentidadeGenero(){

        return IdentidadeGenero::all();

    }
}
