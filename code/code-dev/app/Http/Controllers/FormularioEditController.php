<?php

namespace App\Http\Controllers;

use App\Models\FormularioSuspencion;
use App\Models\Suspension;
use App\Models\Formulario;
use Illuminate\Http\Request;

class FormularioEditController extends Controller
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
        $comprobar=0;


        if(isset($_POST['id_formulario']))
        {
        $form = $_POST['id_formulario'];
        
        foreach($form as $id){
            $form_susp = new FormularioSuspencion();
            $form_susp->id_suspension=$request->get('id_suspension');
            $form_susp->id_formulario = $id;
            $form_susp->estado='Aceptado';
            $form_susp->save();
        }

        alert()->success('Se ha guardado la suspencion');

        
        }

        return redirect()->route('oficios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $suspencion = Suspension::find($id);
        $formularios_existentes=FormularioSuspencion::where('id_suspension',$id)->get();
        $formularios = Formulario::all();
        foreach($formularios as $id_obj => $obj )
        {
            foreach ( $formularios_existentes as $item)
            {   
            if ( $item->id_formulario == $obj->id_formulario )
            {   
            $formularios->pull( $id_obj);
            }
            }
        }
        return view('editform.oficioshow', compact('suspencion','formularios_existentes','formularios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function edit(FormularioSuspencion $formularioSuspencion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormularioSuspencion $formularioSuspencion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormularioSuspencion $formularioSuspencion)
    {
        //
    }
}
