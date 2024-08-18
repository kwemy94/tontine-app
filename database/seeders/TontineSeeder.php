<?php

namespace Database\Seeders;

use App\Models\Cycle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TontineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tontines = array(
            array(
                "name_tontine" => "Tontine scolaire",
                "cycle_id" => Cycle::inRandomOrder()->first()->id,
                "start_date" => '2024-01-01',
                "end_date" => "2024-12-31",
                "amount_tontine" => 15000,
            ),
            array(
                "name_tontine" => "Tontine scolaire",
                "cycle_id" => Cycle::inRandomOrder()->first()->id,
                "start_date" => now(),
                "end_date" => "2024-12-31",
                "amount_tontine" => 15000,
            ),
            array(
                "name_tontine" => "Tontine construction",
                "cycle_id" => Cycle::inRandomOrder()->first()->id,
                "start_date" => now(),
                "end_date" => "2024-12-31",
                "amount_tontine" => 50000,
            ),
            array(
                "name_tontine" => "Tontine solidarité",
                "cycle_id" => Cycle::inRandomOrder()->first()->id,
                "start_date" => now(),
                "end_date" => "2024-12-31",
                "amount_tontine" => 25000,
            ),
        );

    

        foreach ($tontines as $tontine) {
            $existTontine = DB::table('tontines')->where('name_tontine', $tontine['name_tontine'])->first();

            if (!$existTontine) {
                
                DB::table('tontines')->insert($tontine);
            }

        }
    }
}
