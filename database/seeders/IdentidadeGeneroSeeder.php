<?php

namespace Database\Seeders;

use App\Models\identidades_generos\IdentidadeGenero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentidadeGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $identidades = [
            ['nome' => 'Masculino'],
            ['nome' => 'Feminino'],
            ['nome' => 'Não-binário'],
            ['nome' => 'Transgênero'],
            ['nome' => 'Gênero fluido'],
            ['nome' => 'Agênero'],
            ['nome' => 'Bigênero'],
            ['nome' => 'Outro'],
        ];

        foreach ($identidades as $identidade){
            IdentidadeGenero::create($identidade);
        }
    }
}
