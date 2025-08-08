<?php

namespace Database\Seeders;

use App\Models\orientacoes_sexuais\OrientacaoSexual;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrientacaoSexualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orientacoes = [
            ['nome' => 'Heterossexual'],
            ['nome' => 'Homossexual'],
            ['nome' => 'Bissexual'],
            ['nome' => 'Assexual'],
            ['nome' => 'Pansexual'],
            ['nome' => 'Sapiossexual'],
            ['nome' => 'Demissexual'],
            ['nome' => 'Outro'],
        ];

        foreach ($orientacoes as $orientacao) {
            OrientacaoSexual::create($orientacao);
        }
    }
}
