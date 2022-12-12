<?php

namespace App\Http\Controllers;

#use App\Models\User;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

use App\Traits\Controllers\ChangeImageTrait;

use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\Input;


#use DB;
use Hash;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    

    const PERMISSIONS = [
        'create' => 'admin-user-create',
        'show' => 'admin-user-show',
        'edit' => 'admin-user-edit',
        'edit-image' => 'admin-user-image',
        'assign-roles' => 'admin-user-role',
        'assign-permissions' => 'admin-user-permission',
    ];
    #function __construct()
    #{
    #    $this->middleware('permission:especialidad-list|especialidad-create|especialidad-edit|especialidad-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:especialidad-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:especialidad-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:especialidad-delete', ['only' => ['destroy']]);
    #}

    public function index()
    {
        #$usuarios = User::orderBy('id','DESC')->paginate(5);
        #return view('usuarios.index',compact('usuarios'))
        #    ->with('i', (request()->input('page', 1) - 1) * 5);
    
        $users = User::paginate();

        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        #$roles = Role::pluck('name','name')->all();
        #return view('usuarios.create',compact('roles'));
    
        return view('user.create', [
            'row' => new User()
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        #$this->validate($request, [
        #    'ibm' => 'required',
        #    'name' => 'required',
        #    'email' => 'required|email|unique:users,email',
        #    'password' => 'required|same:confirm-password',
        #    'roles' => 'required',
        #]);

        #$input = $request->all();
        #$input['password'] = Hash::make($input['password']);
    
        #$user = User::create($input);
        #$user->assignRole($request->input('roles'));
    
        #return redirect()->route('usuarios.index')
        #                ->with('success','User created successfully');
    
        $status = 'success';
        $content = 'El usuario ha sido creado correctamente';

        DB::beginTransaction();
        try {
            $row = new User();
            $row->fill($request->all());
            $row->password = bcrypt($request->username);

            $row->created_by         = 1; // TODO Eliminar este paso porque obtendra del usuario en sesión
            $row->updated_by         = 1; // TODO Eliminar este paso porque obtendra del usuario en sesión
            $row->save();

            DB::commit();

            return redirect()
                ->route('user.show', $row->id)
                ->with('process_result', [
                    'status' => $status,
                    'content' => $content
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de crear el usuario';

            return redirect()
                ->route('user.create')
                ->withInput($request->all())
                ->with('process_result', [
                    'status' => $status,
                    'content' => $content
                ]);
        }
    }

    public function show(User $user)
    {
        #$user = User::find($id);
        #return view('usuarios.show',compact('user'));
    
        return view('user.show', [
            'row' => $user,
            'roles' => Role::orderBy('id')->get(),
            'permissions' => Permission::orderBy('id')->get(),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $status = 'success';
        $content = 'El usuario ha sido actualizado correctamente';

        DB::beginTransaction();
        try {
            $user->fill($request->all())->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de la actualización del usuario';
        }

        return redirect()
            ->route('user.show', $user->id)
            ->with('process_result', [
                #'status' => $status,
                #'content' => $content
            ])
        ;
    }

    public function edit($id)
    {
        #$usuario = User::find($id);
        #$roles = Role::pluck('name','name')->all();
        #$userRole = $usuario->roles->pluck('name','name')->all();
    
        #return view('usuarios.edit',compact('usuario','roles','userRole'));
    }

    #public function update(Request $request, $id)
    #{
    #    $this->validate($request, [
    #        'name' => 'required',
    #        'email' => 'required|email|unique:users,email,'.$id,
    #        'roles' => 'required',
    #    ]);
    
    #    $input = $request->all();
    
    #    $user = User::find($id);
    #    $user->update($input);
    #    DB::table('model_has_roles')->where('model_id',$id)->delete();
    
    #    $user->assignRole($request->input('roles'));
    
    #    return redirect()->route('usuarios.index')
    #                    ->with('success','User updated successfully');
    #}


    

    public function role(Request $request, User $user)
    {
        $status = 'success';
        $content = 'Se asignó correctamente los roles al usuario';

        DB::beginTransaction();
        try {
            $user->roles()->sync($request->roles);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de la asignación de los roles al usuario';
        }

        return redirect()
            ->route('user.show', $user->id)
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ])
        ;
    }


    public function permission(Request $request, User $user)
    {
        $status = 'success';
        $content = 'Se asignó correctamente los permisos al usuario';

        DB::beginTransaction();
        try {
            $user->syncPermissions($request->permissions);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            $status = 'error';
            $content = 'Se produjo un error al momento de la asignación de los permisos al usuario';
        }

        return redirect()
            ->route('user.show', $user->id)
            ->with('process_result', [
                'status' => $status,
                'content' => $content
            ])
        ;
    }



    #public function destroy($id)
    #{
    #    User::find($id)->delete();
    #    return redirect()->route('usuarios.index')
    #                    ->with('success','User deleted successfully');
    #}
}
