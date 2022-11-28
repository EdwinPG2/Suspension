<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuspController extends Controller
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'observacion' => 'exclude|max:250',
            'estado' => 'required|max:20',
            
        ]);

        $Suspension = Suspension::find($id);
        $Suspension->observacion = $request->get('observacion');
        $Suspension->estado = $request->get('estado');
        $Suspension->id_usuario_revisor= '11';
        $Suspension->fecha_revision= date('d-m-Y');

        $Suspension->save();

        alert()->success('Suspension actualizada correctamente');

        return redirect()->route('revofi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function show(Suspension $suspension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspension $suspension)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'observacion' => 'exclude|max:250',
            'estado' => 'required|max:20',
            
        ]);

        $Suspension = Suspension::find($id);
        $Suspension->observacion = $request->get('observacion');
        $Suspension->estado = $request->get('estado');
        $Suspension->users_id_revisor= Auth::user()->id;
        $Suspension->fecha_revision= date('d-m-Y');

        $Suspension->save();

        

        alert()->success('Suspension actualizada correctamente');

        return redirect()->route('revofi.index');
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
