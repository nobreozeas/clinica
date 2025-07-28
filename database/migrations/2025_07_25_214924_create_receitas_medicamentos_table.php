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
        Schema::create('receitas_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->unsignedBigInteger('receita_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->string('quantidade');
            $table->string('dosagem');
            $table->foreign('receita_id')->references('id')->on('receitas');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receitas_medicamentos');
    }
};
