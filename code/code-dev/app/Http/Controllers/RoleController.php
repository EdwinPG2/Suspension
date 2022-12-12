<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
#use DB;

use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    const PERMISSIONS = [
        'create' => 'admin-role-create',
        'show' => 'admin-role-show',
        'edit' => 'admin-role-edit',
        'delete' => 'admin-role-delete',
    ];

    public function index()
    {
        #$roles = Role::orderBy('id')->paginate(5);
        #return view('roles.index',compact('roles'))
        #    ->with('i', (request()->input('page', 1) - 1) * 5);
        $rows = Role::orderBy('name')->paginate();

        return view('role.index', [
            'rows' => $rows,
        ]);
        #$roles = Rol::all();

        #return view('roles/index', compact('roles'));
    }

    public function create()
    {
        #$permission = Permission::get();
        #return view('roles.create',compact('permission'));
        return view('role.create', [
            'row' => new Role(),
            'permissions' => Permission::all(),
        ]);
        #$roles = Rol::all();
        #return view('roles/create', compact('roles'));
    }

    public function store(Request $request)
    {
        #$this->validate($request, [
        #    'name' => 'required|unique:roles,name',
        #    'permission' => 'required',
        #]);
    
        #$role = Role::create(['name' => $request->input('name')]);
        #$role->syncPermissions($request->input('permission'));
    
        #return redirect()->route('roles.index')
        #                ->with('success','Role created successfully');

        #return view('roles.index')

        $status = 'success';
        $content = 'El rol ha sido creado correctamente';

        DB::beginTransaction();
        try {
            $row = new Role($request->all());
            $row->save();

            $row->permissions()->sync($request->permission);

            DB::commit();

            return redirect()
                ->route('role.show', $row->id)
                ->with('process_result', [
                    'status' => $status,
                    'content' => $content
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de crear el rol';

            return redirect()
                ->route('role.create')
                ->withInput($request->all())
                ->with('process_result', [
                    'status' => $status,
                    'content' => $content
                ]);
        }

    }

    public function show(Role $role)
    {
        //
        return view('role.show', [
            'row' => $role->load('permissions', 'users')
        ]);
    }

    public function edit(Role $role)
    {
        #$role = Role::find($id);
        #$permission = Permission::get();
        #$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        #    ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        #    ->all();
    
        #return view('roles.edit',compact('role','permission','rolePermissions'));
        return view('role.edit', [
            'row' => $role,
            'permissions' => Permission::all(),
        ]);
        #$roles = Rol::find($id);
        #return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, Role $role)
    {
        #$this->validate($request, [
        #    'name' => 'required',
        #    'permission' => 'required',
        #]);


        #$role = Role::find($id);
        #$role->name = $request->input('name');
        #$role->save();
    
        #$role->syncPermissions($request->input('permission'));
    
        #return redirect()->route('roles.index')
        #                ->with('success','Role updated successfully');
        
        $status = 'success';
        $content = 'El rol ha sido actualizado correctamente';

        DB::beginTransaction();
        try {
            $role->update($request->all());
            $role->permissions()->sync($request->permission);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de la actualización del rol';
        }

        return redirect()
            ->route('role.show', $role->id)
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ])
        ;

    }

    public function destroy(Role $role)
    {
        #DB::table("roles")->where('id',$id)->delete();
        #return redirect()->route('roles.index')
        #                ->with('success','Role deleted successfully');
        
        $role->delete();

        return redirect()
            ->route('roles.index')
            ->with('process_result', [
                'status' => 'success',
                'content' => 'El rol fue eliminado satisfactoriamente'
            ]);

        #$rol = Rol::find($id);
        #$rol->delete();

        #alert()->success('Rol eliminado correctamente');
        
        #return redirect()->route('roles.index');
    }
}
