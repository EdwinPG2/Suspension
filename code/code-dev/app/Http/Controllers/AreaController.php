<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
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
        $areas = Area::all();

        return view('areas/index', compact('areas'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('areas/create', compact('areas'));
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100',
        ])->validate();
        
        $area = new Area();
        $area->nombre = $request->get('nombre');
        $area->descripcion = $request->get('descripcion');

        $area->save();

        alert()->success('Area guardado correctamente');
        return redirect()->route('areas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $areas = Area::find($id);
        return view('areas.edit', compact('areas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:100'
        ]);
        
        $area = Area::find($id);
        $area->nombre = $request->get('nombre');
        $area->descripcion = $request->get('descripcion');

        $area->save();

        alert()->success('Area actualizado correctamente');
        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();

        alert()->success('Area eliminado correctamente');
        
        return redirect()->route('areas.index');
    }
}
