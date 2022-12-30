<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\Bitacora;
use App\Models\Afiliado;
use App\Models\BitacoraSuspension;
use App\Models\Suspension;
use App\Models\OficioSuspencion;
use Illuminate\Support\Facades\Auth;
use App\Models\Requerimiento;
use Illuminate\Http\Request;

class ReqController extends Controller
{

    public function index()//requerimientos resueltos
    {
        $oficios = Oficio::all();
        $requerimientos = Requerimiento::where('estado','Resuelto')->take(50)->get();
        return view('requerimientos.index', compact('oficios', 'requerimientos'));
    }

    public function create()
    {
        //
    }

    public function store($id)
    {
        
    }

    public function show($id)
    {
        $suspension = Suspension::find($id);
        $suspension->estado = "Validado";
        
        $suspension->save();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Validación de la suspensión';
        $bitacora->descripcion = 'La suspensión '.$id.' se valido para pago';
        $bitacora->save();

        alert()->success('Suspensión validada!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $suspension = Suspension::find($id);
        $suspension->estado = "Denegado";
        
        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Suspensión denegada';
        $bitacora->descripcion = 'La suspensión '.$id.' se denego antes del pago';
        $bitacora->save();

        $suspension->save();
        alert()->info('Suspensión denegada!');

        return redirect()->back();
    }

    public function update(Request $request, Requerimiento $requerimiento)
    {
        //
    }

    public function destroy(Requerimiento $requerimiento)
    {
        //
    }
}
