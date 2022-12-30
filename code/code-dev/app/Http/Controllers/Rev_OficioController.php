<?php

namespace App\Http\Controllers;

use App\Models\RevisionOficio;
use Illuminate\Http\Request;
use App\Models\Oficio;
use App\Models\OficioSuspencion;
use App\Models\Controller\oficontroller;
use Illuminate\Support\Facades\Auth;
use App\Models\Suspension;
use Illuminate\Support\Carbon;
use App\Models\Bitacora;
use function GuzzleHttp\Promise\all;

class Rev_OficioController extends Controller
{
    

    public function index()
    {
        $congelados = 'En revisión';
        $ofisusp = OficioSuspencion::all();
        $oficios = Oficio::all();
        return view('rev_oficio.index', compact('ofisusp', 'oficios', 'congelados'));
    }

    public function create()
    {
        $revofis = RevisionOficio::all();
        
        $oficios = Oficio::all();
        return view('rev_oficio.create',compact('revofis', 'oficios'));
    }

    public function store($id)
    {
        
    }


    public function show($id)
    {
        $ofisusp = OficioSuspencion::where('id_oficio',$id)->get();
        $oficio = Oficio::find($id);

        $cont=$ofisusp;

        foreach($cont as $id_obj => $obj )
        {
            if ( $obj->desuspension->estado == 'Rechazado')
            {   
            $cont->pull( $id_obj);
            
            }
        }

        if($cont->count()>0){
            $oficio->estado='Congelado';
        }
        else
        {
            $oficio->estado='Congelado N';
        }

        $oficio->users_id_revisor=Auth::user()->id;

        $revofis = new RevisionOficio();
        $revofis->fecha_rev = date('d-m-Y');
        $revofis->id_oficio = $id;
        $revofis->users_id= Auth::user()->id;

        $oficio->save();
        $revofis->save();

        $bitacora = new Bitacora();
        $bitacora->id_usuario = Auth::user()->id;
        $bitacora->fecha_hora = Carbon::now()->format('Y/m/d');
        $bitacora->accion = 'Oficio congelado';
        $bitacora->descripcion = 'Congelo el oficio  '.$id;
        $bitacora->save();

        alert()->success('Oficio enviado a delegación!');

        return redirect()->route('revofi.index');
    }

    public function edit($id)
    {
        $suspencion = Suspension::all();
        $ofisusp = OficioSuspencion::all();
        $oficios = Oficio::find($id);
        return view('rev_oficio.edit', compact('ofisusp', 'oficios', 'suspencion'));
    }

    public function update(Request $request, RevisionOficio $revisionOficio)
    {
        //
    }


    public function destroy($id)
    {
        
    }
}
