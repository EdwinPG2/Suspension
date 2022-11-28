<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{


    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        #$roles = Rol::all();

        #return view('roles/index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles.create',compact('permission'));
        #$roles = Rol::all();
        #return view('roles/create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('roles.edit',compact('role','permission','rolePermissions'));
        #$roles = Rol::find($id);
        #return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
        #$rol = Rol::find($id);
        #$rol->delete();

        #alert()->success('Rol eliminado correctamente');
        
        #return redirect()->route('roles.index');
    }
}
