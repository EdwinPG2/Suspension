<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;


class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $usuarios = User::orderBy('id')->paginate(80);
        return view('usuarios.index',compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        $permission = Permission::get();
        return view('usuarios.create',compact('roles', 'permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'ibm' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role_id' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = new User();
        $user->ibm=$input['ibm'];
        $user->name=$input['name'];
        $user->apellido=$input['apellido'];
        $user->email=$input['email'];
        $user->password=$input['password'];
        $user->role_id=$input['role_id'][0];
        $user->save();
        $permissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$request->input('role_id'))
        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        ->all();
        $user->givePermissionTo($permissions);
        if(!empty($request->input['permission'])){
            $user->givePermissionTo($request->input('permission'));
        }

        alert()->success('Usuario creado correctamente');
        return redirect()->route('usuarios.index');
        
            
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('usuarios.show',compact('user'));
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $roles = Role::pluck('name','id')->all();
        $idrol = $usuario->roles->pluck('id','name')->first();
        $userRole = $usuario->roles->pluck('name','name')->all();

        $permission = Permission::get();
        $rolePermissions = $usuario->getAllPermissions()->pluck('id','id')->all();
    
        return view('usuarios.edit',compact('usuario','roles','userRole', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role_id' => 'required',
        ]);
    
        $input = $request->all();
        
        $input['role_id']=$input['role_id'][0];
        $user = User::find($id);
        $user->update($input);
        
        $rolePermissions = $user->getAllPermissions()->pluck('id','id')->all();
        $getpermissions = $request->input('permission');
        foreach ($getpermissions as $permission) {
            if(!in_array($permission,$rolePermissions)){
                $user->givePermissionTo($permission);
            }
        }
        foreach ($rolePermissions as $permiso){
            if(!in_array($permiso,$getpermissions)){
                $user->revokePermissionTo($permiso);
            }
        }

        alert()->success('usuario actualizado correctamente');

        return redirect()->route('usuarios.index');
    
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        alert()->success('usuario eliminado correctamente');

        return redirect()->route('usuarios.index');
        
    }
}