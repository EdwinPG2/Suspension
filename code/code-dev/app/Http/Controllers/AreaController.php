<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    #function __construct()
    #{
    #    $this->middleware('permission:area-list|area-create|area-edit|area-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:area-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:area-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:area-delete', ['only' => ['destroy']]);
    #}

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

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Creación de área';
        $bitacora->descripcion = 'Creación del área '.$area->nombre;
        $bitacora->save();

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

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Modificación de área';
        $bitacora->descripcion = 'Modificación del área '.$area->nombre;
        $bitacora->save();
        $area->save();

        alert()->success('Area actualizado correctamente');
        return redirect()->route('areas.index');
    }

    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Eliminación de área';
        $bitacora->descripcion = 'Eliminación del área '.$area->nombre;
        $bitacora->save();

        alert()->success('Area eliminado correctamente');
        
        return redirect()->route('areas.index');
    }
}
