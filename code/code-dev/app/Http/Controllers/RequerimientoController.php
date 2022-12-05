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

class RequerimientoController extends Controller
{
    
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
        validator::make($request->except('_token'), [
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

        ])->validate();
        

        try {
            $requerimiento = new Requerimiento();
            $requerimiento->no_requerimiento = $request->get('no_requerimiento');
            $requerimiento->fecha_requerimiento = $request->get('fecha_requerimiento');
            $requerimiento->fecha_envio = $request->get('fecha_envio');
            $requerimiento->estado = $request->get('estado');
            $requerimiento->observaciones = $request->get('observaciones');
            $requerimiento->fecha_recepcion_regmed = $request->get('fecha_recepcion_regmed');
            $requerimiento->id_oficio = $request->get('id_oficio');
            $requerimiento->no_afiliado = $request->get('no_afiliado');
            $requerimiento->users_id_remitente = $request->get('id_usuario');
            if($request->hasFile('archivo'))
            {
                $archivo = $request->file('archivo');
                $archivo->move(public_path().'/archivos/', $archivo->getClientOriginalName());
                $requerimiento->archivo= $archivo->getClientOriginalName();
            }
                
            $requerimiento->save();
        } catch (\Throwable $th) {
            //throw $th;
        }
        


        alert()->success('Requerimiento guardado correctamente');

        return redirect()->route('requerimientos.index');
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
        $suspencion = Suspension::all();
        $ofisusp = OficioSuspencion::all();
        $oficios = Oficio::find($id);
        return view('rev_requerimientos.edit', compact('ofisusp', 'oficios', 'suspencion'));
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
