<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encabezado;
use Illuminate\Support\Facades\Validator;

class EncabezadoController extends Controller
{
    
    public function index()
    {
        $encabezados = Encabezado::all();
        return view('encabezados/index', compact('encabezados'));
    }

    public function create()
    {
        $encabezados = Encabezado::all();
        return view('encabezados/create', compact('encabezados'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre_destinatario' => 'required|max:100',
            'saludo' => 'required|max:100',
            'lugar' => 'required|max:100',
            'despedida' => 'required|max:100',
        ])->validate();
        
        $encabezado = new Encabezado();
        $encabezado->nombre_destinatario = $request->get('nombre_destinatario');
        $encabezado->saludo = $request->get('saludo');
        $encabezado->lugar = $request->get('lugar');
        $encabezado->despedida = $request->get('despedida');

        $encabezado->save();

        alert()->success('Encabezado guardado correctamente');
        return redirect()->route('encabezados.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $encabezados = Encabezado::find($id);
        return view('encabezados.edit', compact('encabezados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_destinatario' => 'required|max:100',
            'saludo' => 'required|max:100',
            'lugar' => 'required|max:100',
            'despedida' => 'required|max:100',
        ]);

        $encabezado = Encabezado::find($id);
        $encabezado->nombre_destinatario = $request->get('nombre_destinatario');
        $encabezado->saludo = $request->get('saludo');
        $encabezado->lugar = $request->get('lugar');
        $encabezado->despedida = $request->get('despedida');

        alert()->success('Encabezado actualizado correctamente');

        return redirect()->route('encabezados.index');
    }

    public function destroy($id)
    {
        $encabezado = Encabezado::find($id);
        $encabezado->delete();

        alert()->success('Encabezado eliminado correctamente');
        
        return redirect()->route('encabezados.index');
    }
}
