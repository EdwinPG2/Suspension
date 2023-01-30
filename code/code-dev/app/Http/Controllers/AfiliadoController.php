<?php

namespace App\Http\Controllers;

use App\Models\Afiliado;
use App\Models\Bitacora;
use App\Models\TipoAfiliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AfiliadoController extends Controller
{
    #function __construct()
    #{
    #    $this->middleware('permission:afiliado-list|afiliado-create|afiliado-edit|afiliado-delete', ['only' => ['index','show']]);
    #    $this->middleware('permission:afiliado-create', ['only' => ['create','store']]);
    #    $this->middleware('permission:afiliado-edit', ['only' => ['edit','update']]);
    #    $this->middleware('permission:afiliado-delete', ['only' => ['destroy']]);
    #}
    
    public function index()
    {
        $afiliados = Afiliado::all();
        $tipo = TipoAfiliado::all();

        return view('afiliados/index', compact('afiliados','tipo'));

    }

    public function create()
    {
        
        $afiliados = Afiliado::all();
        $tipos = TipoAfiliado::all();

        return view('afiliados/create', compact('afiliados','tipos'));
    }

    public function store(Request $request)
    {

        try {
            
            validator::make($request->except('_token'), [
                'no_afiliado' => 'required|max:13',
                'nombre' => 'required|max:100',
                'apellidos' => 'required|max:100',
                
            ])->validate();
    
            $Afiliado = new Afiliado();
            $Afiliado->no_afiliado = $request->get('no_afiliado');
            $Afiliado->cui = $request->get('cui');
            $Afiliado->nombre = $request->get('nombre');
            $Afiliado->apellidos = $request->get('apellidos');
            $Afiliado->telefono = $request->get('telefono');
            $Afiliado->direccion = $request->get('direccion');
            $Afiliado->genero = $request->get('genero');
            $Afiliado->fecha_nacimiento = $request->get('fecha_nacimiento');
            $Afiliado->ibm = $request->get('ibm');
            $Afiliado->id_tipo_afiliado = $request->get('id_tipo_afiliado');
            $Afiliado->reglon = $request->get('renglon');

            $bitacora = new Bitacora();
            $bitacora->id_usuario = Auth::user()->id;
            $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
            $bitacora->accion = 'Creacion Afiliado';
            $bitacora->descripcion = 'Creacion del afiliado #'.$Afiliado->no_afiliado;

            $bitacora->save();
            $Afiliado->save();
    
            alert()->success('Afiliado guardado correctamente');

    
            return redirect()->route('afiliados.index');
            
        } catch (\Throwable $th) {
            error_log($th);
            alert()->error('Error al ingreso de datos, verifique campos y longitudes');
            return redirect()->back();
        }
        
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $afiliados = Afiliado::find($id);
        $tipos = TipoAfiliado::all();

        return view('afiliados.edit', compact('afiliados','tipos'));
    }

    public function update(Request $request, $id)
    {
        try{
        $request->validate([
            'no_afiliado' => 'required|max:13',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'telefono' => 'required|max:15',
        ]);

        $Afiliado = Afiliado::find($id);
        $Afiliado->no_afiliado = $request->get('no_afiliado');
        $Afiliado->cui = $request->get('cui');
        $Afiliado->nombre = $request->get('nombre');
        $Afiliado->apellidos = $request->get('apellidos');
        $Afiliado->telefono = $request->get('telefono');
        $Afiliado->direccion = $request->get('direccion');
        $Afiliado->genero = $request->get('genero');
        $Afiliado->fecha_nacimiento = $request->get('fecha_nacimiento');
        $Afiliado->ibm = $request->get('ibm');
        $Afiliado->id_tipo_afiliado = $request->get('id_tipo_afiliado');

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Actualización Afiliado';
        $bitacora->descripcion = 'Actualización del afiliado #'.$Afiliado->no_afiliado;
        $bitacora->save();

        $Afiliado->save();

        alert()->success('Afiliado actualizado correctamente');

        return redirect()->route('afiliados.index');
        } catch (\Throwable $th) {

        error_log($th);
        alert()->error('Error al ingreso de datos, verifique campos y longitudes');
        return redirect()->back();
        
        }
    }

    public function destroy($id)
    {
        //
        Afiliado::destroy($id);
        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Eliminación Afiliado';
        $bitacora->descripcion = 'Eliminación del afiliado #'.$id;
        $bitacora->save();
        alert()->success('Afiliado eliminado correctamente');
        
        return redirect()->route('afiliados.index');
    }
}
