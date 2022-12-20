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
        $this->middleware('permission:medico-list|medico-create|medico-edit|medico-delete', ['only' => ['index','show']]);
        $this->middleware('permission:medico-create', ['only' => ['create','store']]);
        $this->middleware('permission:medico-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:medico-delete', ['only' => ['destroy']]);
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
        try{
        validator::make($request->except('_token'), [
            'colegiado'=> 'required|max:10',
            'nombres' => 'required|max:45',
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
        } catch (\Throwable $th) {
            error_log($th);
            alert()->error('Error al ingreso de datos, verifique campos y longitudes');
            return redirect()->back();
        }
    
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
        
        try{
        $request->validate([
            'colegiado'=> 'required|max:10',
            'nombres' => 'required|max:45',
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
    } catch (\Throwable $th) {
        error_log($th);
        alert()->error('Error al ingreso de datos, verifique campos y longitudes');
        return redirect()->back();
    }
    }

    public function destroy($id)
    {
        Medico::destroy($id);
        alert()->success('Médico eliminado correctamente');
        return redirect()->route('medico.index');
    }
}
