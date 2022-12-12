<?php

namespace Database\Seeders;

#use Illuminate\Database\Seeder;
#use App\Models\User;
#use Spatie\Permission\Models\Role;
#use Spatie\Permission\Models\Permission;

use App\Entities\User;
use Illuminate\Database\Seeder;

#use DB;


#class CreateAdminUserSeeder extends Seeder
#{
    
    #public function run()
    #{
    
    #    $user = User::create([
    #        'ibm' => '1000269',
    #        'name' => 'Francisco Isaac',
    #        'apellido' => 'López Martinez',
    #        'email' => 'francicoi.lopez@igssgt.org',
    #        'password' => bcrypt('Igssxela'),
    #    ]);
    
    #    $role = Role::create(['name' => 'Super Administrador']);
    
    #    $permissions = Permission::pluck('id','id')->all();

    #    $role->syncPermissions($permissions);
    
    #    $user->assignRole([$role->id]);
    #}
#}

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        User::truncate();
        /*
        'first_name'
        'last_name'
        'email'
        'username'
        'password'
        'email_verified_at'
        'start_date'
        'end_date'
        */
        $root = new User();
        $root->email = 'root@ticket.com';
        $root->username = 'root';
        $root->first_name = 'Root';
        $root->password = 'password';
        $root->created_by = 1;
        $root->updated_by = 1;
        $root->save();

        $user = new User();
        $user->email = 'jaime@jaimevirruetaf.com';
        $user->username = 'jaime';
        $user->first_name = 'Jaime D.';
        $user->last_name = 'Virrueta Fuentes';
        $user->password = bcrypt('password');
        $user->created_by = $root->id;
        $user->updated_by = $root->id;
        $user->save();

        factory(User::class, 100)->create([
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);
    }
}