<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Rol;

use DB;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-reset',
            
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'especialidad-list',
            'especialidad-create',
            'especialidad-edit',
            'especialidad-delete',

            'area-list',
            'area-create',
            'area-edit',
            'area-delete',
            
            'clinica-list',
            'clinica-create',
            'clinica-edit',
            'clinica-delete',

            'medico-list',
            'medico-create',
            'medico-edit',
            'medico-delete',

            'oficio-list',
            'oficio-create',
            'oficio-edit',
            'oficio-delete',

            'formulario_suspencion-list',
            'formulario_suspencion-create',
            'formulario_suspencion-edit',
            'formulario_suspencion-delete',

            'formulario-list',
            'formulario-create',
            'formulario-edit',
            'formulario-delete',

            'oficio_suspencion-list',
            'oficio_suspencion-create',
            'oficio_suspencion-edit',
            'oficio_suspencion-delete',

            'revs-list',
            'revs-create',
            'revs-edit',
            'revs-delete',

            'suspencion-list',
            'suspencion-create',
            'suspencion-edit',
            'suspencion-delete',

            'afiliado-list',
            'afiliado-create',
            'afiliado-edit',
            'afiliado-delete',

            'tipo_afiliado-list',
            'tipo_afiliado-create',
            'tipo_afiliado-edit',
            'tipo_afiliado-delete',


        ];

        foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
        }
    }
}