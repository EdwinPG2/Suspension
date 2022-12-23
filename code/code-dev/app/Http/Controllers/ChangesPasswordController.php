<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class ChangesPasswordController extends Controller
{
    public function index($id)
    {
        $user = User::where('id',$id)->first();
        return view('auth/passwords/reset',compact('user'));
        alert()->success('Contraseña actualizada correctamente');

    }
    

    public function update(Request $request,$id){
        $this->validate($request,[
            'password' => 'required|confirmed'
        ]);

        $user = User::find($id);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        alert()->success('Contraseña actualizada correctamente');
        return redirect('/login')->with('message', 'Contraseña actualizada correctamente');
    }

    public function resetpass($id){

        $user = User::find($id);
        $user->password = Hash::make('Igssxela');
        $user->save();
        alert()->success('Contraseña reseteada correctamente a Igssxela');
        return redirect()->route('usuarios.index');
        
    }
}
