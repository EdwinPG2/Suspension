<?php

namespace App\Http\Controllers;
use App\Models\Cargo;
use App\Models\Requerimiento;
use App\Models\RespuestaRequerimiento;
use App\Models\ClinicaServicio;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        Cache::forget('requerimiento');
        Cache::forget('respuesta');

        validator::make($request->except('_token'), [
            'desino_nombre' => 'required|max:50',
            'destino_area' => 'required|max:50',
            'destino_lugar' => 'required|max:50',
            'cuerpo' => 'required|max:900',
            'nombre_usuario' => 'required|max:50',
            'vobo' => 'required|max:50',
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
        $respuesta->estado = 'En espera';
        $respuesta->fecha_respuesta =Carbon::now()->format('Y/m/d');

        $clinica = ClinicaServicio::find(41);
        $correlativo=$clinica->correlativo;
        $respuesta->correlativo = strval($correlativo);

        $correlativo=$correlativo+1;

        $clinica->correlativo=$correlativo;
        $clinica->save();

        if($request->hasFile('archivo_respuesta'))//guardamos copia del archivo subido en la carpeta public
        {
            $archivo_respuesta= $request->file('archivo_respuesta');
            $archivo_respuesta->move(public_path().'/archivos/', $archivo_respuesta->getClientOriginalName());
            $respuesta->archivo_respuesta = $archivo_respuesta->getClientOriginalName();
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
    public function edit($id)
    {
        $requerimiento = Requerimiento::find($id);
        $pdf = PDF::loadView('respuesta.pdf', ['requerimiento'=>$requerimiento]);
        $pdf->setPaper('letter', 'portrait');
        $pdf->render();
        return $pdf->stream();
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
