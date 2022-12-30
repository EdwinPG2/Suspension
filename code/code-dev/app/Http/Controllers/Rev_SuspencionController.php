<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\OficioSuspencion;
use App\Models\RevisionOficio;
use App\Models\RevSusp;
use App\Models\Suspension;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Rev_SuspencionController extends Controller
{
    
    
    public function index()
    {
        $rev_sus = RevSusp::all();

        return view('revs_suspenciones.index', compact('rev_sus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $rev_sus = RevSusp::all();

        return view('revs_suspenciones.create',compact('rev_sus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'id_suspension' => 'required|max:11',
            'id_revision_oficio'=>'required|max:11',
        ])->validate();

        $rev_sus= new RevSusp();
        $rev_sus->observacion = $request->get('observacion');
        $rev_sus->id_revision_oficio = $request->get('id_revision_oficio');
        $rev_sus->id_suspension = $request->get('id_suspension');
        $rev_sus->save();

        alert()->success('Revisión concretada!');

        return redirect()->route('suspencions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RevSusp  $revSusp
     * @return \Illuminate\Http\Response
     */
    public function show($id)//genera pago de suspension
    {
        $suspension = Suspension::find($id);

        $suspension->pago = "SI";
        $suspension->estado = "Archivado";

        $suspension->save();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Pago aceptado';
        $bitacora->descripcion = 'Se acepto el pago de la suspensión '.$id;
        $bitacora->save();

        alert()->success('Pago validado');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RevSusp  $revSusp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revofi = RevisionOficio::all();
        $suspension = Suspension::find($id);
        $revsusp = RevSusp::all();
        $ofisusp = OficioSuspencion::all();
        return view('revs_suspenciones.edit', compact('revsusp', 'suspension','ofisusp', 'revofi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RevSusp  $revSusp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nombre_especialidad' => 'required|max:100',
            'descripcion' => 'required|max:45'
        ]);

        $especialidad = Especialidad::find($id);
        $especialidad->nombre_especialidad = $request->get('nombre_especialidad');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->save();

        alert()->success('Especialidad actualizado correctamente');

        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RevSusp  $revSusp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RevSusp::destroy($id);
        return redirect()->route('revs_suspenciones.index');
    }
}
