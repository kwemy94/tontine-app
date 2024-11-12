<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array(
            array(
                'name' => "SUPER-ADMIN",
                'guard_name' => "super-admin"
            ),
            array(
                'name' => "ADMIN",
                'guard_name' => "admin"
            ),
            array(
                'name' => "ADHERENT",
                'guard_name' => "adhérent"
            ),
        );

        foreach ($roles as $key => $role) {
            $existRole = DB::table('roles')->whereName($role['name'])->first();
            if (!$existRole) {
                $id = DB::table('roles')->insertGetId($role);

            }
        }
    }
}
