<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Validator;

class EspecialidadController extends Controller
{
    #public function __construct()
    #{
    #    $this->middleware('auth');
    #}
    function __construct()
    {
        $this->middleware('permission:especialidad-list|especialidad-create|especialidad-edit|especialidad-delete', ['only' => ['index','show']]);
        $this->middleware('permission:especialidad-create', ['only' => ['create','store']]);
        $this->middleware('permission:especialidad-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:especialidad-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {

        $especialidades = Especialidad::all();
        return view('especialidades/index', compact('especialidades'));        
    }


    public function create()
    {

        $especialidades = Especialidad::all();
        return view('especialidades/create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre_especialidad' => 'required|max:100',
        ])->validate();

        $especialidad = new Especialidad();
        $especialidad->nombre_especialidad = $request->get('nombre_especialidad');
        $especialidad->descripcion = $request->get('descripcion');

        $especialidad->save();

        alert()->success('Especialidad guardado correctamente');

        return redirect()->route('especialidades.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $especialidades = Especialidad::find($id);
        return view('especialidades.edit', compact('especialidades'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_especialidad' => 'required|max:100',
        ]);

        $especialidad = Especialidad::find($id);
        $especialidad->nombre_especialidad = $request->get('nombre_especialidad');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->save();

        alert()->success('Especialidad actualizado correctamente');

        return redirect()->route('especialidades.index');
    }

    
    public function destroy($id)
    {
        $especialidad = Especialidad::find($id);
        $especialidad->delete();

        alert()->success('Especialidad eliminado correctamente');
        
        return redirect()->route('especialidades.index');
    }
}
