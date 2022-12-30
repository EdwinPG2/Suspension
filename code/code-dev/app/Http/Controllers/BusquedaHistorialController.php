<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use App\Models\Afiliado;
use App\Models\OficioSuspencion;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BusquedaHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $afiliado=null;
        $suspencions=null;
        return view('historial.create',compact('afiliado','suspencions'));
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
        
        $no_afiliado =$request->get('no_afiliado');
        $suspencions = Suspension::where('no_afiliado',$no_afiliado)->get();
        
        $afiliado=Afiliado::find($request->get('no_afiliado'));

        $fin=collect();
        foreach($suspencions as $id_obj => $obj )
        {
            $original=$fin;
            $aux=OficioSuspencion::where('id_suspension',$obj->id_suspension)->get();
            $fin=$original->concat($aux);
        }
        return view('historial.create',compact('afiliado','fin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function show(Suspension $suspension)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspension $suspension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suspension $suspension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspension $suspension)
    {
        //
    }
}
