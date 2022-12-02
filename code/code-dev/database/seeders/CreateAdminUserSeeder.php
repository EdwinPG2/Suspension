<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#use DB;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $user = User::create([
            'ibm' => '1000269',
            'name' => 'admin',
            'apellido' => 'admin',
            'email' => 'admin@igssgt.org',
            'password' => bcrypt('Igssxela'),
        ]);
    
        $role = Role::create(['name' => 'Super Administrador']);
    
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
    
        $user->assignRole([$role->id]);
    }
}