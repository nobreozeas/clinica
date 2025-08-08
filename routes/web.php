<?php

use App\Http\Controllers\Exames\ExamesController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Pacientes\PacientesController;
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
    Route::get('/listar', [ExamesController::class, 'listarPacientes'])->name('listarPacientes');
});

