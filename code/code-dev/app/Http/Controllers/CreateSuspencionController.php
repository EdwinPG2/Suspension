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
use App\Models\Dependencium;
use App\Models\Cargo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateSuspencionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:suspension-list|suspension-create|suspension-edit|suspension-delete', ['only' => ['index','show']]);
        $this->middleware('permission:suspension-create', ['only' => ['create','store']]);
        $this->middleware('permission:suspension-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:suspension-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //$suspencions = Suspension::all();
        $suspencions = Suspension::where('users_id_registrador',Auth::user()->id)->where('estado','Registrado')->orWhere('estado','Rechazado')->get();
        $formularios_suspencion=FormularioSuspencion::all();
        return view('createsuspencions/index', compact('suspencions','formularios_suspencion'));
    }

    public function create()
    {
        $riesgo=Riesgo::all();
        $suspencions = Suspension::all();
        $clinicas_servicios = ClinicaServicio::all();
        $areas=Area::all();
        $especialidads=Especialidad::all();
        $medicos=Medico::all();
        $dependencias=Dependencium::all();
        $cargos=Cargo::all();
        //$afiliados=Afiliado::all();
        $afiliados=Afiliado::select('no_afiliado', 'nombre', 'apellidos')->get();

        return view('createsuspencions/create', compact('suspencions','clinicas_servicios','areas','especialidads','medicos','afiliados','riesgo','dependencias','cargos'));
    }

    public function store(Request $request)
    {
        //$id=Auth::tbl_usuario()->usu_id;
        try {

            validator::make($request->except('_token'), [
                'fecha_inicio_suspension' => 'date:d/m/Y',
                'fecha_fin_suspension' => 'date:d/m/Y',
                'fecha_registro' => 'date:d/m/Y H:i:s',
                'estado' => 'required|max:20',
                'no_afiliado' => 'required',
                'id_clinica_servicio' => 'required',
                'fecha_inicio_caso' => 'required',
                'id_riesgo' => 'required',
                
                
            ])->validate();
    
            $Suspension = new Suspension();
            $Suspension->fecha_inicio_suspension = $request->get('fecha_inicio_suspension');
            $Suspension->fecha_fin_suspension = $request->get('fecha_fin_suspension');
            if($request->get('fecha_alta')!=null)
            {
            $Suspension->fecha_alta = $request->get('fecha_alta');
            }
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
            $Suspension->id_riesgo=$request->get('id_riesgo');
    
            if($request->get('check')=='Y')
            {
                $afiliado = Afiliado::find($request->get('no_afiliado'));
                $afiliado->colaborador = $request->get('check');
                $afiliado->ibm = $request->get('ibm');
                $afiliado->id_dependencia = $request->get('dependencia');
                $afiliado->id_cargo = $request->get('cargo');
                $afiliado->save();
            }
            else {
                $afiliado = Afiliado::find($request->get('no_afiliado'));
                $afiliado->colaborador = $request->get('check');
                $afiliado->reglon = $request->get('renglon');
                $afiliado->save();
            }
            
    
            $Suspension->save();
    
            //alert()->success('Suspension guardado correctamente');
    
            return redirect()->route('agregarformularios.create');

            
        } catch (\Throwable $th) {
            alert()->error('Error en los campos, revise el numero de médico y afiliado');
            return redirect()->route('createsuspencions.create');
            
        }
    }

    public function show($id)
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
        $dependencias=Dependencium::all();
        $cargos=Cargo::all();
        //$afiliados=Afiliado::all();
        $afiliados=Afiliado::select('no_afiliado', 'nombre', 'apellidos')->get();

        return view('createsuspencions.edit', compact('suspencion','clinicas_servicios','areas','especialidads','medicos','afiliados','riesgo','cargos','dependencias'));
    }
    public function update(Request $request, $id)
    {
        try{
        $request->validate([
            'fecha_inicio_suspension' => 'date:d/m/Y',
            'fecha_fin_suspension' => 'date:d/m/Y',
            'fecha_registro' => 'date:d/m/Y H:i:s',
            'estado' => 'required|max:20',
            'no_afiliado' => 'required',
            'id_clinica_servicio' => 'required',
            'fecha_inicio_caso' => 'required',
            'id_riesgo' => 'required',
            'medico_colegiado' => 'required',
            
        ]);

        $Suspension = Suspension::find($id);
        $Suspension->fecha_inicio_suspension = $request->get('fecha_inicio_suspension');
        $Suspension->fecha_fin_suspension = $request->get('fecha_fin_suspension');
        if($request->get('fecha_alta')!=null)
        {
        $Suspension->fecha_alta = $request->get('fecha_alta');
        }
        else
        {
            $Suspension->fecha_alta=null;
        }
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

        if($request->get('check')=='Y')
        {
            $afiliado = Afiliado::find($request->get('no_afiliado'));
            $afiliado->colaborador = $request->get('check');
            $afiliado->ibm = $request->get('ibm');
            $afiliado->id_dependencia = $request->get('dependencia');
            $afiliado->id_cargo = $request->get('cargo');
            $afiliado->save();
        }
        else {
            $afiliado = Afiliado::find($request->get('no_afiliado'));
            $afiliado->colaborador = $request->get('check');
            $afiliado->save();
        }

        alert()->success('Suspensión actualizada correctamente');

        return redirect()->route('createsuspencions.index');;
        
    } catch (\Throwable $th) {
        alert()->error('Error en los campos, revise el numero de médico y afiliado');
        return redirect()->route('createsuspencions.create');
        
    }
    }

    public function destroy($id)
    {
        //
        Suspension::destroy($id);
        return redirect()->route('createsuspencions.index');
    }
}
