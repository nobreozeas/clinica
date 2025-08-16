<?php

use App\Http\Controllers\especialidades\EspecialidadeController;
use App\Http\Controllers\etnias\EtniaController;
use App\Http\Controllers\Exames\ExamesController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\identidades_generos\IdentidadeGeneroController;
use App\Http\Controllers\medicos\MedicoController;
use App\Http\Controllers\orientacoes_sexuais\OrientacaoSexualController;
use App\Http\Controllers\Pacientes\PacientesController;
use App\Http\Controllers\racas\RacaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::group(['prefix' => 'exames', 'as' => 'exames.'], function () {
    Route::get('/', [ExamesController::class, 'index'])->name('index');
    Route::get('/adicionar', [ExamesController::class, 'create'])->name('create');
    Route::post('/salvar', [ExamesController::class, 'store'])->name('store');
    Route::get('/editar/{id}', [ExamesController::class, 'edit'])->name('edit');
    Route::post('/atualizar/{id}', [ExamesController::class, 'update'])->name('update');
    Route::get('/excluir/{id}', [ExamesController::class, 'destroy'])->name('destroy');
    Route::get('/listar', [ExamesController::class, 'listarExames'])->name('listarExames');
});

Route::group(['prefix' => 'pacientes', 'as' => 'pacientes.'], function () {
    Route::get('/', [PacientesController::class, 'index'])->name('index');
    Route::get('/adicionar', [PacientesController::class, 'create'])->name('create');
    Route::post('/salvar', [PacientesController::class, 'store'])->name('store');
    Route::get('/editar/{id}', [PacientesController::class, 'edit'])->name('edit');
    Route::post('/atualizar/{id}', [PacientesController::class, 'update'])->name('update');
    Route::get('/excluir/{id}', [PacientesController::class, 'destroy'])->name('destroy');
    Route::get('/listar', [PacientesController::class, 'listarPacientes'])->name('listarPacientes');
});



Route::group(['prefix' => 'medicos', 'as' => 'medicos.'], function () {
    Route::get('/', [MedicoController::class, 'index'])->name('index');
    Route::get('/adicionar', [MedicoController::class, 'create'])->name('create');
    Route::post('/salvar', [MedicoController::class, 'store'])->name('store');
    Route::get('/editar/{id}', [MedicoController::class, 'edit'])->name('edit');
    Route::post('/atualizar/{id}', [MedicoController::class, 'update'])->name('update');
    Route::get('/excluir/{id}', [MedicoController::class, 'destroy'])->name('destroy');
    Route::get('/listar', [MedicoController::class, 'listarMedicos'])->name('listarMedicos');
});

Route::get('/orientacao-sexual/listar', [OrientacaoSexualController::class, 'listarOrientacaoSexual'])->name('orientacaoSexual.listar');
Route::get('/identidade-genero/listar', [IdentidadeGeneroController::class, 'listarIdentidadeGenero'])->name('identidadeGenero.listar');
Route::get('/raca/listar', [RacaController::class, 'listarRaca'])->name('raca.listar');
Route::get('/etnia/listar', [EtniaController::class, 'listarEtnia'])->name('etnia.listar');

Route::get('/especialidade/listar', [EspecialidadeController::class, 'listarEspecialidade'])->name('especialidade.listar');
