<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:especialidad-list|especialidad-create|especialidad-edit|especialidad-delete', ['only' => ['index','show']]);
        $this->middleware('permission:especialidad-create', ['only' => ['create','store']]);
        $this->middleware('permission:especialidad-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:especialidad-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $medicos = Medico::all();
        
        return view('medico.index', compact('medicos'));
    }

    public function create()
    {
        $medicos = Medico::all();
        $especialidades = Especialidad::all();
        return view('medico.create', compact('medicos', 'especialidades'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'colegiado'=> 'required|max:10',
            'nombres' => 'required|max:45',
		    'especialidad' => 'required|max:45',
		    'telefono' => 'exclude|max:11',
            'id_especialidad' => 'required|max:5',
        ])->validate();

        $medico = new Medico();
        $medico->colegiado=$request->get('colegiado');
        $medico->nombres = $request->get('nombres');
        $medico->especialidad = $request->get('especialidad');
        $medico->telefono = $request->get('telefono');
        $medico->id_especialidad = $request->get('id_especialidad');

        $medico->save();

        alert()->success('Médico guardado correctamente');

        return redirect()->route('medico.index');
    
    }

    public function show(Medico $medico)
    {
        //
    }

    public function edit($id)
    {
        $medicos = Medico::find($id);
        $especialidades = Especialidad::all();
        return view('medico.edit', compact('medicos', 'especialidades'));
    }

    public function update(Request $request, $id)
    {
        
        alert('Holi');
        $request->validate([
            'nombres' => 'required|max:45',
		    'especialidad' => 'required|max:45',
		    'telefono' => 'exclude|max:10',
            'id_especialidad' => 'required|max:5',
        ]);
        $medico = Medico::find($id);
        $medico->colegiado=$request->get('colegiado');
        $medico->nombres = $request->get('nombres');
        $medico->especialidad = $request->get('especialidad');
        $medico->telefono = $request->get('telefono');
        $medico->id_especialidad = $request->get('id_especialidad');

        $medico->save();

        alert()->success('Médico actualizado correctamente');

        return redirect()->route('medico.index');
    }

    public function destroy($id)
    {
        Medico::destroy($id);
        return redirect()->route('medico.index');
    }
}
