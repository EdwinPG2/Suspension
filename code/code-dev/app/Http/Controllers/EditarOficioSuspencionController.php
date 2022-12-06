<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\OficioSuspencion;
use App\Models\Suspension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditarOficioSuspencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $sus = $_POST['id_suspension'];
        
        foreach($sus as $id){
            $ofi_sus = new OficioSuspencion();
            $ofi_sus->id_oficio=$request->get('id_oficio');
            $ofi_sus->id_suspension = $id;
            $ofi_sus->estado='Activo';
            
            
            $ofi_sus->save();
        }

        alert()->success('Se ha agregado la suspencion');

        return redirect()->route('oficios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $oficio = Oficio::find($id);
        $suspenciones_existentes=OficioSuspencion::where('id_oficio',$id)->get();
        //$suspenciones = Suspension::all();
        $suspenciones=Suspension::where('users_id_registrador',Auth::user()->id)->where('estado','Registrado')->orWhere('estado','Rechazado')->get();//a;adir condicion de usuario
        foreach($suspenciones as $id_obj => $obj )
        {
            foreach ( $suspenciones_existentes as $item)
            {   
            if ( $item->id_oficio == $obj->id_suspension )
            {   
            $suspenciones->pull( $id_obj);
            }
            }
        }
        return view('agregarsuspenciones.show', compact('oficio','suspenciones_existentes','suspenciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficio $oficio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficio $oficio)
    {
        //
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
