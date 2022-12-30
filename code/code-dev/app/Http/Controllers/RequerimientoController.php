<?php

namespace App\Http\Controllers;

use App\Models\Requerimiento;
use App\Models\Oficio;
use App\Models\Afiliado;
use App\Models\Bitacora;
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

        try {
            validator::make($request->except('_token'), [
                'no_requerimiento' => 'required|max:50',
                'fecha_requerimiento' => 'required|date:d/m/Y',
                'estado' => 'required|max:20',
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

                $bitacora = new Bitacora();
                $bitacora->id_usuario = Auth::user()->id;
                $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
                $bitacora->accion = 'Creación de requerimiento';
                $bitacora->descripcion = 'Se creo el requerimiento '.$requerimiento->no_requerimiento;
                $bitacora->save();

                alert()->success('Requerimiento guardado correctamente');

            return redirect()->route('req.index');
            
        } catch (\Throwable $th) {
            alert()->error('Verifique que todos los campos esten llenos');
            return back();
        }

    }


    public function show($id)//denegar el pago de la suspension
    {
        $suspension = Suspension::find($id);

        $suspension->pago = "NO";
        $suspension->estado = "Archivado";
        
        $suspension->save();
        alert()->danger('Pago Validado');

        return redirect()->route('revreq.index');
    }

    public function edit($id)//retorna la vista de las suspensiones en delegacion
    {
        $ofisusp = OficioSuspencion::where('id_oficio',$id)->get();
        $oficios = Oficio::find($id);
        return view('rev_requerimientos.edit', compact('ofisusp', 'oficios'));
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
        
        return redirect()->route('req.index');
    }

    public function aceptar($id)
    {
        $requerimiento = Requerimiento::find($id);
        $requerimiento->estado = 'Resuelto';
        $requerimiento->save();

        alert()->success('Requerimiento aceptado');
        
        return redirect()->route('req.index');
    }

    public function espera()
    {

        $oficios = Oficio::all();
        $requerimientos = Requerimiento::where('estado','En espera')->take(50)->get();
        return view('requerimientos.index', compact('oficios', 'requerimientos'));
    }
    public function generado()
    {

        $oficios = Oficio::all();
        $requerimientos = Requerimiento::where('estado','Generado')->take(50)->get();
        return view('requerimientos.index', compact('oficios', 'requerimientos'));

    }
}
