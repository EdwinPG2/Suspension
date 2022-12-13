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

            'oficio-list',
            'oficio-create',
            'oficio-edit',
            'oficio-delete',
            'oficio-validar',

            'suspension-list',
            'suspension-create',
            'suspension-edit',
            'suspension-delete',

            'rev_oficio-list',
            'rev_oficio-create',
            'rev_oficio-edit',
            'rev_oficio-delete',

            'rev_Suspension-list',
            'rev_Suspension-create',
            'rev_Suspension-edit',
            'rev_Suspension-delete',

            'formulario-list',
            'formulario-create',
            'formulario-edit',
            'formulario-delete',

            'archivo-list',
            'archivo-create',
            'archivo-edit',
            'archivo-delete',

            'reporte-list',
            'reporte-create',
            'reporte-edit',
            'reporte-delete',

            'afiliado-list',
            'afiliado-create',
            'afiliado-edit',
            'afiliado-delete',

            'tipo_afiliado-list',
            'tipo_afiliado-create',
            'tipo_afiliado-edit',
            'tipo_afiliado-delete',

            'area-list',
            'area-create',
            'area-edit',
            'area-delete',

            'especialidad-list',
            'especialidad-create',
            'especialidad-edit',
            'especialidad-delete',

            'clinica-list',
            'clinica-create',
            'clinica-edit',
            'clinica-delete',

            'medico-list',
            'medico-create',
            'medico-edit',
            'medico-delete',

            'riesgo-list',
            'riesgo-create',
            'riesgo-edit',
            'riesgo-delete',

            'dependencia-list',
            'dependencia-create',
            'dependencia-edit',
            'dependencia-delete',

            'formulario_suspension-list',
            'formulario_suspension-create',
            'formulario_suspension-edit',
            'formulario_suspension-delete',

            'oficio_suspension-list',
            'oficio_suspension-create',
            'oficio_suspension-edit',
            'oficio_suspension-delete',

            'revs-list',
            'revs-create',
            'revs-edit',
            'revs-delete',

            'req-list',
            'req-create',
            'req-edit',
            'req-delete',

            'requerimiento-list',
            'requerimiento-create',
            'requerimiento-edit',
            'requerimiento-delete',
            
            'susp-list',
            'susp-create',
            'susp-edit',
            'susp-delete',

            'changes_password-list',
            'changes_password-update',
            'changes_password-resetpass',
            'changes_password-delete',


        ];

        foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
        }

    
    }
}