<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = array(
            array(
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make(12345678),
                'phone' => "12456"
            ),
            array(
                'name' => 'Shell',
                'email' => 'grantshell0@gmail.com',
                'password' => Hash::make('123shell'),
                'phone' => "672517118"
            ),
            array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make("admin-shell"),
                'phone' => "123456"
            )
        );

        foreach ($users as $user) {
            $existUser = DB::table('users')->where('phone', $user['phone'])->orWhere('phone', $user['phone'])->first();

            if (!$existUser) {
                
                DB::table('users')->insert($user);
            }

        }
    }
}
