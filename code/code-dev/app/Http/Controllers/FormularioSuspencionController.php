<?php

namespace App\Http\Controllers;

use App\Models\FormularioSuspencion;
use App\Models\Suspension;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FormularioSuspencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//vista de seguimiento de suspensiones en delegacion
        $suspenciones = Suspension::all();

        return view('seguimiento.validada', compact('suspenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $suspencion = Suspension::latest('id_suspension')->first();
        
        $formularios = Formulario::all();
        

        return view('agregarformularios/create', compact('suspencion','formularios'));
    
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

        return redirect()->route('createsuspencions.index');
        //return Redirect::to(url()->previous());
        //return alert()->success('Se ha guardado la suspencion');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formularios=FormularioSuspencion::where('id_suspension',$id)->get();
        $suspencion = Suspension::find($id);
        

        return view('agregarformularios.show', compact('suspencion','formularios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormularioSuspencion  $formularioSuspencion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id)
    {
        FormularioSuspencion::destroy($id);
        return redirect()->back();
    }
}
