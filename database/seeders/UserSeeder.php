<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make(12345678),
            'phone'=> "123456"
        ]);
        User::factory()->create([
            'name' => 'Shell',
            'email' => 'grantshell0@gmail.com',
            'password' => Hash::make('123shell'),
            'phone'=> "672517118"
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make("admin-shell"),
            'phone'=> "123456"
        ]);
    }
}
