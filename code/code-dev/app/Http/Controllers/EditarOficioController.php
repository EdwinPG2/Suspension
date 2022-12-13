<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\OficioSuspencion;
use App\Models\Suspension;
use App\Models\ClinicaServicio;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EditarOficioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspenciones = Suspension::all();

        return view('seguimiento.revisada', compact('suspenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function show($id)//En esta funcion mandamos el oficio al departamento de revisiones
    {
        $oficio = Oficio::find($id);
        $oficio->estado='En revisión';//cambiamos el estado para mostrar diferentes opciones de manejo
        $oficio->users_id_revisor=Auth::user()->id;

        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();

        $suspenciones=Suspension::all();

        foreach($suspenciones as $id_obj => $obj )
        {
            foreach ( $ofi_susp as $item)
            {   
            if ( $item->desuspension->id_suspension == $obj->id_suspension )
            {
            
            $suspenciones->pull( $id_obj);//con esto mandamos solo las suspensiones que esten dentro del oficio
            $sus = Suspension::find($item->desuspension->id_suspension);
            $sus->estado = 'En revisión';
            $sus->save();//cambiamos el estado de la suspension para tener diferentes opciones en los siguientes modulos
            }
            }
        }


        $oficio->save();


        alert()->success('Oficio enviado a revisión!');

        return redirect()->route('oficios.index');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficio = Oficio::find($id);
        $clinicas = ClinicaServicio::all();

        return view('editaroficios.edit', compact('oficio','clinicas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'destinatario' => 'required|max:50',
            'saludo' => 'required|max:250',
            'lugar' => 'required|max:250',
            'correlativo' => 'required|max:250',
            'clinica_servicio' => 'required',
            'fecha' => 'date:d/m/Y',
            'despedida' => 'required|max:250',
            'estado' => 'required|max:20',
            'users_id_creador' => 'required|max:11',
        ])  ;
        
        $oficio = Oficio::find($id);
        $oficio ->destinatario = $request->get('destinatario');
        $oficio ->saludo = $request->get('saludo');
        $oficio ->lugar = $request->get('lugar');
        $oficio ->correlativo = $request->get('correlativo');
        $oficio ->clinica_servicio = $request->get('clinica_servicio');
        $oficio ->fecha = $request->get('fecha');
        $oficio ->despedida = $request->get('despedida');
        $oficio ->estado = $request->get('estado');
        $oficio ->users_id_creador = $request->get('users_id_creador');
        
        $oficio->save();

        return redirect()->route('ofisusp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficio $oficio)
    {
        //
    }
}
