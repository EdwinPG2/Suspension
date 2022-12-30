<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use App\Models\OficioSuspencion;
use Illuminate\Http\Request;
use PDF;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $congelados = 'Congelado';
        $ofisusp = OficioSuspencion::all();
        $oficios = Oficio::all();
        return view('rev_oficio.index', compact('ofisusp', 'oficios', 'congelados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formularios = DB::select('call formularios_suspencion_oficio('.$id.')');
        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
        
        $pdf = PDF::loadView('reporteria.pdf_suspension', ['formularios'=>$formularios, 'ofi_susp'=>$ofi_susp]);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//pdf de oficios aceptados
    {
        $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
        if($ofi_susp->count()>0){

            $formularios = DB::select('call formularios_suspencion_oficio('.$id.')');
            $ofi_susp = OficioSuspencion::where('id_oficio',$id)->get();
            $oficio = Oficio::find($id);
            $pdf = PDF::loadView('rev_oficio.pdf_prueba', ['ofi_susp'=>$ofi_susp, 'formularios'=>$formularios, 'oficio'=>$oficio]);
            $pdf->setPaper('letter', 'portrait');
            $pdf->render();
            return $pdf->stream();

        }
        else
        {
            alert()->info('Oficio sin suspensiones');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficio $oficio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficio  $oficio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
