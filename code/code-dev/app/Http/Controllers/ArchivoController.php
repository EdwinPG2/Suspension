<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use App\Models\ClinicaServicio;
use App\Models\Area;
use App\Models\Especialidad;
use App\Models\Afiliado;
use App\Models\Medico;
use App\Models\FormularioSuspencion;
use App\Models\Riesgo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ArchivoController extends Controller
{
    #function __construct()
    #{
    #    $this->middleware('permission:archivo-list|archivo-create|archivo-edit|archivo-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:archivo-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:archivo-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:archivo-delete', ['only' => ['destroy']]);
    #}
    
    public function index()
    {
        //$suspencions = Suspension::all();
        $suspencions = Suspension::all();
        $formularios_suspencion=FormularioSuspencion::all();
        return view('archivos/index', compact('suspencions','formularios_suspencion'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$id=Auth::tbl_usuario()->usu_id;
        validator::make($request->except('_token'), [
            'fecha_inicio_suspension' => 'date:d/m/Y',
            'fecha_fin_suspension' => 'date:d/m/Y',
            'fecha_alta' => 'date:d/m/Y',
            'fecha_registro' => 'date:d/m/Y H:i:s',
            'estado' => 'required|max:20',
            'no_afiliado' => 'required',
            'id_clinica_servicio' => 'required',
            'fecha_inicio_caso' => 'required',
            'fecha_accidente' => 'required',
            'id_riesgo' => 'required',
            
            
        ])->validate();

        $Suspension = new Suspension();
        $Suspension->fecha_inicio_suspension = $request->get('fecha_inicio_suspension');
        $Suspension->fecha_fin_suspension = $request->get('fecha_fin_suspension');
        $Suspension->fecha_alta = $request->get('fecha_alta');
        $Suspension->fecha_registro = $request->get('fecha_registro');
        $Suspension->fecha_envio_prestacion = $request->get('fecha_envio_prestacion');
        $Suspension->fecha_recibido_prestacione = $request->get('fecha_recibido_prestacione');
        $Suspension->fecha_revision = $request->get('fecha_revision');
        $Suspension->observacion = $request->get('observacion');
        $Suspension->estado = $request->get('estado');
        $Suspension->no_afiliado = $request->get('no_afiliado');
        $Suspension->id_clinica_servicio = $request->get('id_clinica_servicio');
        $Suspension->users_id_registrador = $request->get('id_usuario_registrador');
        $Suspension->users_id_revisor = $request->get('id_usuario_revisor');
        $Suspension->medico_colegiado = $request->get('medico_colegiado');
        $Suspension->fecha_inicio_caso = $request->get('fecha_inicio_caso');
        $Suspension->fecha_accidente = $request->get('fecha_accidente');
        $Suspension->id_riesgo = $request->get('id_riesgo');

        $Suspension->save();

        //alert()->success('Suspension guardado correctamente');

        return redirect()->route('agregarformularios.create');
        
    }

    public function show(Suspension $suspension)
    {
        //
    }

    public function edit($id)
    {
        $riesgo=Riesgo::all();
        $suspencion = Suspension::find($id);
        $clinicas_servicios = ClinicaServicio::all();
        $areas=Area::all();
        $especialidads=Especialidad::all();
        $medicos=Medico::all();
        //$afiliados=Afiliado::all();
        $afiliados=Afiliado::select('no_afiliado', 'nombre', 'apellidos')->get();

        return view('archivos.edit', compact('suspencion','clinicas_servicios','areas','especialidads','medicos','afiliados','riesgo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio_suspension' => 'date:d/m/Y',
            'fecha_fin_suspension' => 'date:d/m/Y',
            'fecha_alta' => 'date:d/m/Y',
            'fecha_registro' => 'date:d/m/Y H:i:s',
            'estado' => 'required|max:20',
            'no_afiliado' => 'required',
            'id_clinica_servicio' => 'required',
            'fecha_inicio_caso' => 'required',
            'fecha_accidente' => 'required',
            'id_riesgo' => 'required',
            
        ]);

        $Suspension = Suspension::find($id);
        $Suspension->fecha_inicio_suspension = $request->get('fecha_inicio_suspension');
        $Suspension->fecha_fin_suspension = $request->get('fecha_fin_suspension');
        $Suspension->fecha_alta = $request->get('fecha_alta');
        $Suspension->fecha_registro = $request->get('fecha_registro');
        $Suspension->fecha_envio_prestacion = $request->get('fecha_envio_prestacion');
        $Suspension->fecha_recibido_prestacione = $request->get('fecha_recibido_prestacione');
        $Suspension->fecha_revision = $request->get('fecha_revision');
        $Suspension->observacion = $request->get('observacion');
        $Suspension->estado = $request->get('estado');
        $Suspension->no_afiliado = $request->get('no_afiliado');
        $Suspension->id_clinica_servicio = $request->get('id_clinica_servicio');
        $Suspension->users_id_registrador = $request->get('id_usuario_registrador');
        $Suspension->users_id_revisor = $request->get('id_usuario_revisor');
        $Suspension->medico_colegiado = $request->get('medico_colegiado');
        $Suspension->fecha_inicio_caso = $request->get('fecha_inicio_caso');
        $Suspension->fecha_accidente = $request->get('fecha_accidente');
        $Suspension->id_riesgo = $request->get('id_riesgo');

        $Suspension->save();

        alert()->success('Suspension actualizada correctamente');

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        Suspension::destroy($id);
        return redirect()->route('archivos.index');
    }
}
