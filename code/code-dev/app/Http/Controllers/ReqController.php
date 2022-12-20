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

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $suspension = Suspension::find($id);
        $suspension->estado = "Validado";
        
        $suspension->save();
        alert()->success('Suspensión validada!');

        return redirect()->back();
    }

    public function edit($id)
    {
        //
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
