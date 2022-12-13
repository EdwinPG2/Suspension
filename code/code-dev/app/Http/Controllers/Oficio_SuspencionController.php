<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use App\Models\Oficio;
use App\Models\OficioSuspencion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Oficio_SuspencionController extends Controller
{
    
    
    public function index()
    {
        $ofi_sus = OficioSuspencion::all();
        $oficios = Oficio::all();
        //$suspensiones = Suspension::all();
        $suspensiones = Suspension::where('users_id_registrador',Auth::user()->id)->where('estado','Registrado')->orWhere('estado','Rechazado')->get();
        $oficio = Oficio::latest('id_oficio')->first();
        return view('oficio_suspencion.agregar_oficio', 
        compact('ofi_sus', 'oficios', 'oficio', 'suspensiones'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ofi_sus = OficioSuspencion::all();
        $suspensiones = Suspension::all();
        $oficios = Oficio::all();
        $oficio = Oficio::latest('id_oficio')->first();
        return compact('ofi_sus', 'suspensiones', 'oficios', 'oficio');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sus = $_POST['id_suspension'];
        
        foreach($sus as $id){
            $ofi_sus = new OficioSuspencion();
            $ofi_sus->id_oficio=$request->get('id_oficio');
            $ofi_sus->id_suspension = $id;
            $ofi_sus->estado='Activo';
            
            
            $ofi_sus->save();
        }

       

        alert()->success('Oficio guardado correctamente!');

        return redirect()->route('oficios.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OficioSuspencion  $oficioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function show(OficioSuspencion $oficioSuspencion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OficioSuspencion  $oficioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ofi_sus = OficioSuspencion::find($id);
        $suspensiones = Suspension::all();
        
        return view('oficio_suspencion.edit', compact('ofi_sus'.'suspensiones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OficioSuspencion  $oficioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        validator::make($request->except('_token'), [
            'id_oficio'=> 'required|max:11',
            'id_suspension' => 'required|max:11',
		    'estado' => 'required|max:20',
        ])->validate();

        $ofi_sus = OficioSuspencion::find($id);
        $ofi_sus->id_oficio=$request->get('id_oficio');
        $ofi_sus->id_suspension = $request->get('id_suspension');
        $ofi_sus->estado = $request->get('estado');

        $ofi_sus->save();

        //alert()->success('Médico guardado correctamente');

        return redirect()->route('suspencions.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OficioSuspencion  $oficioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OficioSuspencion::destroy($id);
        return redirect()->back();
    }
}
