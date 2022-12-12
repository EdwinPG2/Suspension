<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
#use Illuminate\Database\Seeder;
#use Spatie\Permission\Models\Permission;
#use Spatie\Permission\Models\Rol;

#use DB;
#class PermissionTableSeeder extends Seeder
#{
    
    #public function run()
    #{
    #    $permissions = [
    #        'user-list',
    #        'user-create',
    #        'user-edit',
    #        'user-delete',
    #        'user-reset',
            
    #        'role-list',
    #        'role-create',
    #        'role-edit',
    #        'role-delete',

    #        'oficio-list',
    #        'oficio-create',
    #        'oficio-edit',
    #        'oficio-delete',
    #        'oficio-validar',

    #        'suspencion-list',
    #        'suspencion-create',
    #        'suspencion-edit',
    #        'suspencion-delete',

    #        'rev_oficio-list',
    #        'rev_oficio-create',
    #        'rev_oficio-edit',
    #        'rev_oficio-delete',

    #        'rev_Suspencion-list',
    #        'rev_Suspencion-create',
    #        'rev_Suspencion-edit',
    #        'rev_Suspencion-delete',

    #        'formulario-list',
    #        'formulario-create',
    #        'formulario-edit',
    #        'formulario-delete',

    #        'Archivado-list',
    #        'Archivado-create',
    #        'Archivado-edit',
    #        'Archivado-delete',

    #        'Reporte-list',
    #        'Reporte-create',
    #        'Reporte-edit',
    #        'Reporte-delete',

    #        'afiliado-list',
    #        'afiliado-create',
    #        'afiliado-edit',
    #        'afiliado-delete',

    #        'tipo_afiliado-list',
    #        'tipo_afiliado-create',
    #        'tipo_afiliado-edit',
    #        'tipo_afiliado-delete',

    #        'area-list',
    #        'area-create',
    #        'area-edit',
    #        'area-delete',

    #        'especialidad-list',
    #        'especialidad-create',
    #        'especialidad-edit',
    #        'especialidad-delete',

    #        'clinica-list',
    #        'clinica-create',
    #        'clinica-edit',
    #        'clinica-delete',

    #        'medico-list',
    #        'medico-create',
    #        'medico-edit',
    #        'medico-delete',

    #        'riesgo-list',
    #        'riesgo-create',
    #        'riesgo-edit',
    #        'riesgo-delete',

    #        'dependencia-list',
    #        'dependencia-create',
    #        'dependencia-edit',
    #        'dependencia-delete',

    #        'formulario_suspencion-list',
    #        'formulario_suspencion-create',
    #        'formulario_suspencion-edit',
    #        'formulario_suspencion-delete',

    #        'oficio_suspencion-list',
    #        'oficio_suspencion-create',
    #        'oficio_suspencion-edit',
    #        'oficio_suspencion-delete',

    #        'revs-list',
    #        'revs-create',
    #        'revs-edit',
    #        'revs-delete',


    #    ];

    #    foreach ($permissions as $permission) {
    #            Permission::create(['name' => $permission]);
    #    }

        #foreach (Role::all() as $rol) {
        #    foreach ($permissions as $p) {
        #        Permission::create(['name' => "{$rol->name} $p"]);
        #    }
        #}
    #}
#}


use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Admin / Users
         */
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['create']], [
            'description' => 'Creación de usuarios'
        ]);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de usuario'
        ]);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['edit']], [
            'description' => 'Edición de usuario'
        ]);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['edit-image']], [
            'description' => 'Edición de imagen del usuario'
        ]);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['assign-roles']], [
            'description' => 'Asignar/Retirar roles al usuario'
        ]);
        Permission::updateOrCreate(['name' => UsersController::PERMISSIONS['assign-permissions']], [
            'description' => 'Asignar/Retirar permisos al usuario'
        ]);

        /**
         * Admin / Permission
         */
        Permission::updateOrCreate(['name' => PermissionController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de permiso'
        ]);

        /**
         * Admin / Role
         */
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['create']], [
            'description' => 'Creación de roles'
        ]);
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['show']], [
            'description' => 'Listado y detalle de roles'
        ]);
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['edit']], [
            'description' => 'Edición de rol'
        ]);
        Permission::updateOrCreate(['name' => RoleController::PERMISSIONS['delete']], [
            'description' => 'Eliminación de roles'
        ]);
    }
}