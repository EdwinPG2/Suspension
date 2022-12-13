<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormularioController extends Controller
{
    
    
    public function index()
    {
        $formularios = Formulario::all();

        #return view('formularios.index', compact(varne: 'formulario'));
        return view('formularios/index', compact('formularios'));
        #Route::get('/formularios.index', 'formularioController@index')->name('formularios.index');
    }

    public function create()
    {
        $formularios = Formulario::all();
        return view('formularios/create', compact('formularios'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100'
        ])->validate();

        $formulario = new Formulario();
        $formulario->nombre = $request->get('nombre');
        $formulario->descripcion = $request->get('descripcion');

        $formulario->save();

        alert()->success('Formulario guardado correctamente');

        return redirect()->route('formularios.index');
        
        
    }

    public function show($id)
    {
        //$suspencion = Suspension::find($id);
        
    }

    public function edit($id)
    {
        $formularios = Formulario::find($id);
        return view('formularios.edit', compact('formularios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100'
        ]);

        $formulario = Formulario::find($id);
        $formulario->nombre = $request->get('nombre');
        $formulario->descripcion = $request->get('descripcion');
        $formulario->save();

        alert()->success('Formulario actualizado correctamente');

        return redirect()->route('formularios.index');
    }

    public function destroy($id)
    {
        //
        Formulario::destroy($id);
        return redirect()->route('formularios.index');
    }
}
