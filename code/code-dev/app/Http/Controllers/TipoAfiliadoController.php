<?php

namespace App\Http\Controllers;

use App\Models\TipoAfiliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoAfiliadoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:especialidad-list|especialidad-create|especialidad-edit|especialidad-delete', ['only' => ['index','show']]);
        $this->middleware('permission:especialidad-create', ['only' => ['create','store']]);
        $this->middleware('permission:especialidad-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:especialidad-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $tipo_afiliados = TipoAfiliado::all();
        return view('tipo_afiliados/index', compact('tipo_afiliados'));
    }

    public function create()
    {
        $tipo_afiliados = TipoAfiliado::all();
        return view('tipo_afiliados/create', compact('tipo_afiliados'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:250'
        ])->validate();

        $tipo_afiliado = new TipoAfiliado();
        $tipo_afiliado->nombre = $request->get('nombre');
        $tipo_afiliado->descripcion = $request->get('descripcion');

        $tipo_afiliado->save();

        alert()->success('Tipo de filiado guardado correctamente');

        return redirect()->route('tipo_afiliados.index');
        
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tipo_afiliados = TipoAfiliado::find($id);
        return view('tipo_afiliados.edit', compact('tipo_afiliados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100'
        ]);

        $tipo_afiliado = TipoAfiliado::find($id);
        $tipo_afiliado->nombre = $request->get('nombre');
        $tipo_afiliado->descripcion = $request->get('descripcion');
        $tipo_afiliado->save();

        alert()->success('TipoAfiliado actualizado correctamente');

        return redirect()->route('tipo_afiliados.index');
    }

    public function destroy($id)
    {
        //
        TipoAfiliado::destroy($id);
        return redirect()->route('tipo_afiliados.index');
    }
}
