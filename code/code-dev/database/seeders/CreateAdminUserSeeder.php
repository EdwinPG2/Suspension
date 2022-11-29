<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'ibm' => '37732',
            'name' => 'Daniel',
            'apellido' => 'Velasquez',
            'email' => 'ricardod.velasquez@igssgt.org',
            'password' => bcrypt('Igss.2022'),
        ]);
    
        $role = Role::create(['name' => 'Administrador']);
    
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
    
        $user->assignRole([$role->id]);
    }
}