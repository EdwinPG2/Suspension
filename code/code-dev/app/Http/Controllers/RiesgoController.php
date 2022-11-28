<?php

namespace App\Http\Controllers;

use App\Models\Riesgo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RiesgoController extends Controller
{
    
    public function index()
    {
        $riesgos = Riesgo::All();
        return view('riesgos/index', compact('riesgos'));
    }

    public function create()
    {
        $riesgos = Riesgo::All();
        return view('riesgos/create', compact('riesgos'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:255',
            'descripcion' => 'required'
        ])->validate();
        
        $riesgo = new Riesgo();
        $riesgo->nombre = $request->get('nombre');
        $riesgo->descripcion = $request->get('descripcion');

        $riesgo->save();

        alert()->success('Riesgo guardado correctamente');
        return redirect()->route('riesgos.index');
    }

    public function show(Riesgo $riesgo)
    {
        //
    }


    public function edit($id)
    {
        $riesgos = Riesgo::find($id);
        return view('riesgos.edit', compact('riesgos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'nullable'
        ]);
        
        $riesgo = Riesgo::find($id);
        $riesgo->nombre = $request->get('nombre');
        $riesgo->descripcion = $request->get('descripcion');

        $riesgo->save();

        alert()->success('Riesgo actualizado correctamente');
        return redirect()->route('riesgos.index');
    }

    public function destroy($id)
    {
        $riesgo = Riesgo::find($id);
        $riesgo->delete();

        alert()->success('riesgo eliminado correctamente');
        
        return redirect()->route('riesgos.index');
    }
}
