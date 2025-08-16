<?php

namespace App\Http\Controllers\especialidades;

use App\Http\Controllers\Controller;
use App\Models\especialidades\Especialidade;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class EspecialidadeController extends Controller
{
    public function listarEspecialidade(){

        $especialidades = Especialidade::all();

        return response()->json([
            'data' => $especialidades
        ]);
    }
}
