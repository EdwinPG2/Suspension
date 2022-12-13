<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Models\Oficio;
use App\Models\Afiliado;
use App\Models\BitacoraSuspension;
use App\Models\Suspension;
use App\Models\User;
use App\Models\OficioSuspencion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class RequerimientoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:requerimiento-list|requerimiento-create|requerimiento-edit|requerimiento-delete', ['only' => ['index','show']]);
        $this->middleware('permission:requerimiento-create', ['only' => ['create','store']]);
        $this->middleware('permission:requerimiento-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:requerimiento-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $oficios = Oficio::all();
        return view('rev_requerimientos.index', compact('oficios'));
    }

    public function create()
    {
        $oficio = Oficio::all();
        $afiliados = Afiliado::all();
        $usuario = User::all();
        $requerimientos = Requerimiento::all();

        return view('requerimientos/create', compact('oficio','afiliados','usuario', 'requerimientos'));
    }


    public function store(Request $request)
    {
        $date = Carbon::now();
        $fecha_env = $date->toDateString();

        validator::make($request->except('_token'), [
            'no_requerimiento' => 'required|max:50',
            'fecha_requerimiento' => 'required|date:d/m/Y',
            'estado' => 'required|max:20',
            'observaciones' => 'required|max:300',

        ])->validate();
        
            $requerimiento = new Requerimiento();
            $requerimiento->no_requerimiento = $request->get('no_requerimiento');
            $requerimiento->fecha_requerimiento = $request->get('fecha_requerimiento');
            $requerimiento->fecha_envio = $fecha_env;
            $requerimiento->estado = $request->get('estado');
            $requerimiento->observaciones = $request->get('observaciones');
            $requerimiento->fecha_recepcion_regmed = $request->get('fecha_recepcion_regmed');
            $requerimiento->no_afiliado = $request->get('no_afiliado');
            $requerimiento->users_id_remitente = Auth::user()->id;


            if($request->hasFile('archivo'))//guardamos copia del archivo subido en la carpeta public
            {
                $archivo = $request->file('archivo');
                $archivo->move(public_path().'/archivos/', $archivo->getClientOriginalName());
                $requerimiento->archivo = $archivo->getClientOriginalName();
                
            }
                
            $requerimiento->save();
            alert()->success('Requerimiento guardado correctamente');
        

        

        return redirect()->route('req.index');
    }


    public function show($id)//denegar el pago de la suspension
    {
        $suspension = Suspension::find($id);

        $suspension->pago = "NO";
        $suspension->estado = "Archivado";

        //$bitacora_suspension = BitacoraSuspension::find($id);
        //$bitacora_suspension->pago = "NO";
        //$bitacora_suspension->save();
        
        $suspension->save();
        alert()->danger('Pago Validado');

        return redirect()->route('revreq.index');
    }

    public function edit($id)//retorna la vista de las suspensiones en delegacion
    {
        $requerimientos = Requerimiento::find($id);
        $suspencion = Suspension::all();
        $ofisusp = OficioSuspencion::all();
        $oficios = Oficio::find($id);
        return view('requerimientos.edit', compact('ofisusp', 'oficios', 'suspencion', 'requerimientos'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'no_requerimiento' => 'required|max:50',
            'fecha_requerimiento' => 'required|date:d/m/Y',
            'fecha_envio' => 'required|date:d/m/Y',
            'estado' => 'required|max:20',
            'observaciones' => 'required|max:300',
            'fecha_recepcion_regmed' => 'required|date:d/m/Y'
            /*'id_oficio' => 'required|max:100',
            'no_afiliado' => 'required|max:100',
            'id_usuario_remitente' => 'required|max:100',
            'id_usuario_responsable' => 'required|max:100'*/
        ]);

        $requerimiento = Requerimiento::find($id);
        $requerimiento->no_requerimiento = $request->get('no_requerimiento');
        $requerimiento->fecha_requerimiento = $request->get('fecha_requerimiento');
        $requerimiento->fecha_envio = $request->get('fecha_envio');
        $requerimiento->estado = $request->get('estado');
        $requerimiento->observaciones = $request->get('observaciones');
        $requerimiento->fecha_recepcion_regmed = $request->get('fecha_recepcion_regmed');
        $requerimiento->id_oficio = $request->get('id_oficio');
        $requerimiento->no_afiliado = $request->get('no_afiliado');
        $requerimiento->users_id_remitente = $request->get('id_usuario');
        $requerimiento->users_id_responsable = $request->get('id_usuario');
        $requerimiento->save();

        alert()->success('Requerimiento actualizado correctamente');

        return redirect()->route('requerimientos.index');
    }

    public function destroy($id)
    {
        $requerimiento = Requerimiento::find($id);
        $requerimiento->delete();

        alert()->success('Requerimiento eliminado correctamente');
        
        return redirect()->route('requerimientos.index');
    }
}
