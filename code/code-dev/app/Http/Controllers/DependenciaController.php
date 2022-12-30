<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependencium;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Validator;

class DependenciaController extends Controller
{
    #function __construct()
    #{
    #    $this->middleware('permission:dependencia-list|dependencia-create|dependencia-edit|dependencia-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:dependencia-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:dependencia-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:dependencia-delete', ['only' => ['destroy']]);
    #}

    public function index()
    {
        $dependencias = Dependencium::all();
        return view('dependencias/index', compact('dependencias'));        
    }

    public function create()
    {
        $dependencias = Dependencium::all();
        return view('dependencias/create', compact('dependencias'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:255',
        ])->validate();

        $dependencia = new Dependencium();
        $dependencia->nombre = $request->get('nombre');
    
        $dependencia->save();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Creación de dependencia';
        $bitacora->descripcion = 'Creación de la dependencia '.$dependencia->nombre;
        $bitacora->save();

        alert()->success('Dependencia guardada correctamente');
        return redirect()->route('dependencias.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $dependencias = Dependencium::find($id);
        return view('dependencias.edit', compact('dependencias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $dependencia = Dependencium::find($id);
        $dependencia->nombre = $request->get('nombre');
        $dependencia->save();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Actualización de dependencia';
        $bitacora->descripcion = 'Actualización de la dependencia '.$dependencia->nombre;
        $bitacora->save();

        alert()->success('Dependencia actualizado correctamente');
        return redirect()->route('dependencias.index');
    }

    public function destroy($id)
    {
        $dependencia = Dependencium::find($id);
        $dependencia->delete();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Eliminación de dependencia';
        $bitacora->descripcion = 'Eliminación de la dependencia '.$id;
        $bitacora->save();

        alert()->success('Dependencia eliminado correctamente');
        return redirect()->route('dependencias.index');
    }
}
