<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('users')->insert(array(
            'ibm' => '1000269',
            'name' => 'Francisco Isaac',
            'apellido' => 'López Martinez',
            'email' => 'francicoi.lopez@igssgt.org',
            'password' => bcrypt('123456'),
        ));
    
        $role = Role::create(['name' => 'Super Administrador']);
    
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
    
        #$user->assignRole([$role->id]);
    }
}