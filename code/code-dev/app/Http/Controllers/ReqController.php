<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\Afiliado;
use App\Models\BitacoraSuspension;
use App\Models\Suspension;
use App\Models\OficioSuspencion;
use Illuminate\Support\Facades\Auth;
use App\Models\Requerimiento;
use Illuminate\Http\Request;

class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficios = Oficio::all();
        $requerimientos = Requerimiento::all();
        return view('requerimientos.index', compact('oficios', 'requerimientos'));
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
     * @param  \App\Models\Requerimiento  $requerimiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suspension = Suspension::find($id);
        $suspension->estado = "Validado";
        
        $suspension->save();
        alert()->success('Suspensión validada!');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requerimiento  $requerimiento
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
    public function destroy(Requerimiento $requerimiento)
    {
        //
    }
}
