<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChangesPasswordController extends Controller
{
    public function index($id)
    {
        $user = User::where('id',$id)->first();
        return view('auth/passwords/reset',compact('user'));
    }
    

    public function update(Request $request,$id){
        $this->validate($request,[
            'password' => 'required|confirmed'
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login');
    }

    public function resetpass($id){
        $user = User::find($id);
        $user->password = Hash::make('Igssxela');
        $user->save();

        alert()->success('Contraseña reseateado correctamente');

        return redirect()->route('usuarios.index');
    }
}
