<?php

namespace App\Http\Controllers;

use App\Models\RevisionOficio;
use Illuminate\Http\Request;
use App\Models\Oficio;
use App\Models\OficioSuspencion;
use Illuminate\Support\Facades\Auth;
use App\Models\Suspension;

use function GuzzleHttp\Promise\all;

class Rev_OficioController extends Controller
{

    public function index()
    {
        $congelados = 'En revision';
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
        
        $oficio = Oficio::find($id);
        $oficio->estado='Congelado';
        $oficio->users_id_revisor=Auth::user()->id;

        $revofis = new RevisionOficio();
        $revofis->fecha_rev = date('d-m-Y');
        $revofis->id_oficio = $id;
        $revofis->users_id= Auth::user()->id;

        $oficio->save();
        $revofis->save();

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
