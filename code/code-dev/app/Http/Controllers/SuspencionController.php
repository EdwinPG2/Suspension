<?php

namespace App\Http\Controllers;

use App\Models\BitacoraSuspension;
use App\Models\Suspension;

use App\Models\ClinicaServicio;
use App\Models\Oficio;
use App\Models\RevisionOficio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SuspencionController extends Controller
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
        $suspencions = Suspension::all();

        return view('suspencions/index', compact('suspencions'));

    }

    public function create()
    {
        
        $suspencions = Suspension::all();
        $clinicas_servicios = ClinicaServicio::all();

        return view('suspencions/create', compact('suspencions','clinicas_servicios'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'fecha_inicio_suspension' => 'date:d/m/Y',
            'fecha_fin_suspension' => 'date:d/m/Y',
            'fecha_alta' => 'date:d/m/Y',
            'fecha_registro' => 'date:d/m/Y H:i:s',
            'fecha_envio_prestacion' => 'date:d/m/Y',
            'fecha_recibido_prestacione' => 'date:d/m/Y',
            'fecha_revision' => 'date:d/m/Y',
            'observacion' => 'required|max:250',
            'estado' => 'required|max:20',
            'no_afiliado' => 'required',
            'id_clinica_servicio' => 'required',
            
        ])->validate();

        $Bitacora_Suspension = new BitacoraSuspension();
        $Bitacora_Suspension->fecha_inicio_suspension = $request->get('fecha_inicio_suspension');
        $Bitacora_Suspension->fecha_fin_suspension = $request->get('fecha_fin_suspension');
        $Bitacora_Suspension->fecha_alta = $request->get('fecha_alta');
        $Bitacora_Suspension->fecha_registro = $request->get('fecha_registro');
        $Bitacora_Suspension->fecha_envio_prestacion = $request->get('fecha_envio_prestacion');
        $Bitacora_Suspension->fecha_recibido_prestacione = $request->get('fecha_recibido_prestacione');
        $Bitacora_Suspension->fecha_revision = $request->get('fecha_revision');
        $Bitacora_Suspension->observacion = $request->get('observacion');
        $Bitacora_Suspension->estado = $request->get('estado');
        $Bitacora_Suspension->no_afiliado = $request->get('no_afiliado');
        $Bitacora_Suspension->id_clinica_servicio = $request->get('id_clinica_servicio');
        $Bitacora_Suspension->users_id_registrador = $request->get('id_usuario_registrador');
        $Bitacora_Suspension->users_id_revisor = $request->get('id_usuario_revisor');

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

        $Suspension->save();

        $Bitacora_Suspension->save();

        alert()->success('Suspension guardado correctamente');

        return redirect()->route('suspencions.index');
        
        
    }

    public function show($id)
    {
        $oficio = Oficio::find($id);
        $oficio->estado='Rechazado';
        $oficio->users_id_revisor='11';

        $revofis = new RevisionOficio();
        $revofis->fecha_rev = date('d-m-Y');
        $revofis->id_oficio = $id;
        $revofis->users_id= '11';

        $oficio->save();
        $revofis->save();

        alert()->info('Oficio Denegado!');

        return redirect()->route('revofi.index');
    }

    public function edit($id)
    {
        $suspencions = Suspension::find($id);

        return view('suspencions.edit', compact('suspencions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_inicio_suspension' => 'date:d/m/Y',
            'fecha_fin_suspension' => 'date:d/m/Y',
            'fecha_alta' => 'date:d/m/Y',
            'fecha_registro' => 'date_format:Y-m-d',
            'fecha_envio_prestacion' => 'date:d/m/Y',
            'fecha_recibido_prestacione' => 'date:d/m/Y',
            'fecha_revision' => 'date:d/m/Y',
            'observacion' => 'required|max:250',
            'estado' => 'required|max:20',
            'no_afiliado' => 'required',
            'id_clinica_servicio' => 'required',
            'id_usuario_registrador' => 'required',
            
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

        $Suspension->save();

        alert()->success('Suspension actualizado correctamente');

        return redirect()->route('suspencions.index');
    }

    public function destroy($id)
    {
        //
        Suspension::destroy($id);
        return redirect()->route('suspencions.index');
    }
}
