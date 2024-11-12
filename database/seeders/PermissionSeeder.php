<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = array(
            array(
                'name' => 'Voir les utilisateurs',
                'guard_name' =>'user p0'
            ),
            array(
                'name' => 'Peut modifier un utilisateur',
                'guard_name' =>'user p1'
            ),
            array(
                'name' => 'Peut supprimer un utilisateur',
                'guard_name' =>'user p2'
            ),
            array(
                'name' => "Peut voir le détail d'un utilisateur",
                'guard_name' =>'user p3'
            ),
            array(
                'name' => 'Peut voir les tontines',
                'guard_name' =>'tontine1'
            ),
            array(
                'name' => 'Peut modifier une tontine',
                'guard_name' =>'tontine2'
            ),
            array(
                'name' => 'Peut supprimer une tontine',
                'guard_name' =>'tontine3'
            ),
            array(
                'name' => "Peut voir le détail d'une tontine",
                'guard_name' =>'tontine4'
            ),
            array(
                'name' => "Peut faire un tirage",
                'guard_name' =>'tirage 1'
            ),
        );

        $superAdminRole = DB::table('roles')->whereName('SUPER-ADMIN')->first();
        // dd($superAdminRole);
        foreach ($permissions as $key => $permission) {
            $existPermission = DB::table('permissions')->whereName($permission['name'])->first();

            if(!$existPermission){
                $id = DB::table('permissions')->insertGetId($permission);
                
                #associer la permission au role super admin
                if ($superAdminRole) {
                    // $currentPermission = DB::table('permissions')->whereId($id)->first();
                    // $currentPermission->syncRoles($superAdminRole);
                }
            }
        }
    }
}
