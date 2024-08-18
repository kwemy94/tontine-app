<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cycles = [
            [
                "intitule" => "Hebdomadaire",
                "description" => "",
            ],
            [
                "intitule" => "Journalière",
                "description" => "",
            ],
            [
                "intitule" => "Mensuel",
                "description" => "",
            ],
            [
                "intitule" => "Trimestriel",
                "description" => "",
            ],
            [
                "intitule" => "Annuel",
                "description" => "",
            ],
        ];

        foreach ($cycles as $cycle) {
            $existCycle =  DB::table('cycles')->where('intitule', $cycle['intitule'])->first();
            if(!$existCycle){
                DB::table('cycles')->insert($cycle);
            }
        }
    }
}
