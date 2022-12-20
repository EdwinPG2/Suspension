<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicaServicio;
use App\Models\Especialidad;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class ClinicaServicioController extends Controller
{
    #function __construct()
    #{
    #    $this->middleware('permission:clinica-list|clinica-create|clinica-edit|clinica-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:clinica-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:clinica-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:clinica-delete', ['only' => ['destroy']]);
    #}

    public function index()
    {
        $especialidade = Especialidad::all();
        $areas = Area::all();
        $clinica_servicios = ClinicaServicio::all();

        return view('clinicas_servicios.index', compact('clinica_servicios'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $areas = Area::all();
        $clinicas_servicios = ClinicaServicio::all();

        return view('clinicas_servicios/create', compact('especialidades','areas', 'clinicas_servicios'));
    }


    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:250',
            'id_especialidad' => 'required|max:100',
            'id_area' => 'required|max:100'

        ])->validate();

        $clinica_servicio = new ClinicaServicio();
        $clinica_servicio->nombre = $request->get('nombre');
        $clinica_servicio->descripcion = $request->get('descripcion');
        $clinica_servicio->id_especialidad = $request->get('id_especialidad');
        $clinica_servicio->id_area = $request->get('id_area');

        $clinica_servicio->save();
        alert()->success('Clinica/servicio guardado correctamente');
        return redirect()->route('clinicas_servicios.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $especialidades = Especialidad::all();
        $areas = Area::all();
        $clinicas_servicios = ClinicaServicio::find($id);
        return view('clinicas_servicios.edit', compact('clinicas_servicios', 'especialidades', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:250',
            'id_especialidad' => 'required|max:100',
            'id_area' => 'required|max:100'
        ]);

        $clinica_servicio = ClinicaServicio::find($id);
        $clinica_servicio->nombre = $request->get('nombre');
        $clinica_servicio->descripcion = $request->get('descripcion');
        $clinica_servicio->id_especialidad = $request->get('id_especialidad');
        $clinica_servicio->id_area = $request->get('id_area');
        $clinica_servicio->save();

        alert()->success('Clinica/servicio actualizado correctamente');
        return redirect()->route('clinicas_servicios.index');
    }

    public function destroy($id)
    {
        $clinica_servicio = ClinicaServicio::find($id);
        $clinica_servicio->delete();

        alert()->success('clinica/servicio eliminado correctamente');
        return redirect()->route('clinicas_servicios.index');
    }
}
