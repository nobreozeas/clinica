<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->date('data_nascimento');
            $table->string('celular1');
            $table->string('celular2')->nullable();
            $table->string('rg')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->date('data_expedicao')->nullable();
            $table->string('uf_expedicao')->nullable();
            $table->unsignedBigInteger('etnia_id')->nullable();
            $table->unsignedBigInteger('raca_id')->nullable();
            $table->unsignedBigInteger('orientacao_sexual_id')->nullable();
            $table->unsignedBigInteger('identidade_genero_id')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('etnia_id')->references('id')->on('etnias');
            $table->foreign('raca_id')->references('id')->on('racas');
            $table->foreign('orientacao_sexual_id')->references('id')->on('orientacoes_sexuais');
            $table->foreign('identidade_genero_id')->references('id')->on('identidades_generos');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
