<?php

namespace App\Http\Controllers\etnias;

use App\Http\Controllers\Controller;
use App\Models\etnias\Etnia;
use Illuminate\Http\Request;

class EtniaController extends Controller
{
    public function listarEtnia(){

        return Etnia::all();

    }
}
