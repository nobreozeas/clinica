<?php

namespace Database\Seeders;

use App\Models\racas\Raca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RacaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $racas = [
            ['nome' => 'Branca'],
            ['nome' => 'Preta'],
            ['nome' => 'Parda'],
            ['nome' => 'Amarela'],
            ['nome' => 'Indígena'],
            ['nome' => 'Outra'],
        ];

        foreach ($racas as $raca) {
            Raca::create($raca);
        }
    }
}
