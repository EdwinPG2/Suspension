<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use App\Models\Requerimiento;
use App\Models\RespuestaRequerimiento;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Respuesta_ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requerimientos = Requerimiento::all();
        return view('respuesta.index', compact('requerimientos'));
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
        validator::make($request->except('_token'), [
            'desino_nombre' => 'required|max:50',
            'destino_area' => 'required|max:50',
            'destino_lugar' => 'required|max:50',
            'cuerpo' => 'required|max:300',
            'nombre_usuario' => 'required|max:50',
            'vobo' => 'required|max:10',
        ])->validate();

        $respuesta = Requerimiento::find($request->get('id_requerimiento'));
        $respuesta->caso = $request->get('caso');
        $respuesta->desino_nombre = $request->get('desino_nombre');
        $respuesta->destino_area = $request->get('destino_area');
        $respuesta->destino_lugar = $request->get('destino_lugar');
        $respuesta->cuerpo = $request->get('cuerpo');
        $respuesta->nombre_usuario = $request->get('nombre_usuario');
        $respuesta->vobo = $request->get('vobo');
        $respuesta->folios = $request->get('folios');
        $respuesta->users_id_respuesta = $request->get('users_id_respuesta');
        $respuesta->id_cargo = $request->get('id_cargo');
        $respuesta->estado = 'Resuelto';

        if($request->hasFile('archivo_respuesta'))//guardamos copia del archivo subido en la carpeta public
        {
            $archivo = $request->file('archivo_respuesta');
            $archivo->move(public_path().'/archivos/', $archivo->getClientOriginalName());
            $respuesta->archivo_respuesta = $archivo->getClientOriginalName();
        }

        $respuesta->save();
        return redirect()->route('respuesta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requerimiento = Requerimiento::find($id);
        $cargos=Cargo::all();
        return view('respuesta/create', compact('requerimiento','cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requerimiento $requerimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
