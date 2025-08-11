<?php

namespace App\Http\Controllers\racas;

use App\Http\Controllers\Controller;
use App\Models\racas\Raca;
use Illuminate\Http\Request;

class RacaController extends Controller
{
    public function listarRaca(){

        return Raca::all();

    }
}
