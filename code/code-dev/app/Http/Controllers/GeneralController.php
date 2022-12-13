<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;
use App\Models\Oficio;
use App\Models\ClinicaServicio;
use App\Models\OficioSuspencion;
use App\Models\Suspension;

class GeneralController extends Controller
{
    public function index(){
        $oficios = Oficio::all();
        $clinicas = ClinicaServicio::all();
        return view('reporteria.index', compact('oficios', 'clinicas'));
    }

    public function show($id)// muestra los PDF rechazados de revisiones a las secretarias
    {
        $formularios = DB::select('call formularios_suspencion_oficio('.$id.')');
        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
        $oficio = Oficio::find($id);
        $pdf = PDF::loadView('rev_oficio.pdf_rechazado', ['ofi_susp'=>$ofi_susp, 'formularios'=>$formularios, 'oficio'=>$oficio]);
        $pdf->setPaper('letter', 'portrait');
        $pdf->render();
        return $pdf->stream();

    }

    public function Suspension_especialidad()
    {

    }
}
