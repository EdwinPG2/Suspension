<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\BitacoraOficio;
use App\Models\BitacoraSuspension;
use App\Models\Oficio;
use App\Models\ClinicaServicio;
use App\Models\OficioSuspencion;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class OficioController extends Controller
{

    public function index()
    {
        //alert('users_id_creador',Auth::user()->id);
        $oficios = Oficio::all();
        //$oficios = Oficio::where('users_id_creador',Auth::user()->id);
        
        return view('oficios/index',compact('oficios'));
    }

    public function create()
    {

        $clinicas = ClinicaServicio::all();
        $oficios = Oficio::all();

        return view('oficios/create',compact('clinicas', 'oficios'));
    
    }

    public function store(Request $request)
    {
        validator::make($request->except('_token'), [
            'destinatario' => 'required|max:50',
            'saludo' => 'required|max:250',
            'lugar' => 'required|max:250',
            'correlativo' => 'required|max:250',
            'clinica_servicio' => 'required',
            'fecha' => 'date:d/m/Y',
            'despedida' => 'required|max:250',
            'estado' => 'required|max:20',
            'users_id_creador' => 'required|max:11',
        ])->validate();


        $oficio = new Oficio();
        $oficio ->destinatario = $request->get('destinatario');
        $oficio ->saludo = $request->get('saludo');
        $oficio ->lugar = $request->get('lugar');
        $oficio ->correlativo = $request->get('correlativo');
        $oficio ->clinica_servicio = $request->get('clinica_servicio');
        $oficio ->fecha = $request->get('fecha');
        $oficio ->despedida = $request->get('despedida');
        $oficio ->estado = $request->get('estado');
        $oficio ->users_id_creador = $request->get('users_id_creador');
        
        $oficio->save();


        return redirect()->route('agregarsuspenciones.show',$oficio->id_oficio);
    }

    public function show($id)
    {
        $formularios = DB::select('call formularios_suspencion_oficio('.$id.')');
        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
        $oficio = Oficio::find($id);
        return view('oficios/detalle',compact('ofi_susp','formularios', 'oficio'));
    }

    public function edit($id)
    {
        
        $formularios = DB::select('call formularios_suspencion_oficio('.$id.')');
        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
        $oficio = Oficio::find($id);
        $pdf = PDF::loadView('oficios.pdf', ['formularios'=>$formularios, 'ofi_susp'=>$ofi_susp, 'oficio'=>$oficio]);
        return $pdf->stream();
    }

    public function detalles($id)
    {
        $oficios = Oficio::all();
        $clinicas = ClinicaServicio::all();
        $ofi_susp = OficioSuspencion::all();
        
        return view('oficios/detalle',compact('oficios', 'clinicas', 'ofi_susp'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
