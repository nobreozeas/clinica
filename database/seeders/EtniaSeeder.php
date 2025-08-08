<?php

namespace Database\Seeders;

use App\Models\etnias\Etnia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etnias = [
            ['nome' => 'Guarani'],
            ['nome' => 'Tupi-Guarani'],
            ['nome' => 'Kaingang'],
            ['nome' => 'Xavante'],
            ['nome' => 'Yanomami'],
            ['nome' => 'Tikuna'],
            ['nome' => 'Pataxó'],
            ['nome' => 'Terena'],
            ['nome' => 'Krahô'],
            ['nome' => 'Macuxi'],
            ['nome' => 'Wapichana'],
            ['nome' => 'Bororo'],
            ['nome' => 'Karajá'],
            ['nome' => 'Ashaninka'],
            ['nome' => 'Apinajé'],
            ['nome' => 'Kayapó'],
            ['nome' => 'Munduruku'],
            ['nome' => 'Suruwahá'],
            ['nome' => 'Kaxinawá'],
            ['nome' => 'Canela'],
            ['nome' => 'Xokleng'],
            ['nome' => 'Fulni-ô'],
            ['nome' => 'Parakanã'],
            ['nome' => 'Panará'],
            ['nome' => 'Ofayé'],
            ['nome' => 'Kamayurá'],
            ['nome' => 'Araweté'],
            ['nome' => 'Tembé'],
            ['nome' => 'Guajajara'],
            ['nome' => 'Karitiana']
        ];

        foreach ($etnias as $etnia) {
            Etnia::create($etnia);
        }
    }
}
