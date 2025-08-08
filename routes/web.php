<?php

use App\Http\Controllers\Exames\ExamesController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/exames', [ExamesController::class, 'index'])->name('exames.index');
Route::get('/exames/adicionar', [ExamesController::class, 'create'])->name('exames.create');
Route::post('/exames/salvar', [ExamesController::class, 'store'])->name('exames.store');
Route::get('/exames/editar/{id}', [ExamesController::class, 'edit'])->name('exames.edit');
Route::post('exames/atualizar/{id}', [ExamesController::class, 'update'])->name('exames.update');
Route::get('/exames/excluir/{id}', [ExamesController::class, 'destroy'])->name('exames.destroy');
Route::get('/exames/listar', [ExamesController::class, 'listarExames'])->name('exames.listarExames');
