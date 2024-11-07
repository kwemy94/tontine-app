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
                'password' => '$2y$12$UHjJ2LRlS7WP2LWXohzQyOGjtkiOt4JgXPwefNIdFcvQIOOIHVcl2',
                'phone' => "12456"
            ),
            array(
                'name' => 'Shell',
                'email' => 'grantshell0@gmail.com',
                'password' => '$2y$12$UHjJ2LRlS7WP2LWXohzQyOGjtkiOt4JgXPwefNIdFcvQIOOIHVcl2',
                'phone' => "672517118"
            ),
            array(
                'name' => 'super-admin',
                'email' => 'gtiwa@utecq.dev',
                'email_verified_at' => now(),
                'password' => '$2y$12$Db/mbVUJO5ztblcK.fX39.Iki0snwHkotjRD26LTFQ/eAbJrY40LO',
                'phone' => "12236"
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
