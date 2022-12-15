<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

#use DB;


class CreateAdminUserSeeder extends Seeder
{
    
    public function run()
    {
        $role = Role::create(['name' => 'Super Administrador']);
    
        $user = User::create([
            'ibm' => '1000269',
            'name' => 'Francisco Isaac',
            'apellido' => 'López Martinez',
            'email' => 'francicoi.lopez@igssgt.org',
            'password' => bcrypt('Igssxela'),
            'role_id' => $role->id,
        ]);
        
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
    
        $user->givePermissionTo($permissions);
    }
}