<?php

namespace App\Http\Controllers;

use App\Models\ClinicaServicio;
use App\Models\Area;
use App\Models\Especialidad;
use App\Models\Riesgo;
use App\Models\Dependencium;
use App\Models\Cargo;

use Illuminate\Http\Request;
use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class ReporteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:reporte-list|reporte-create|reporte-edit|reporte-delete', ['only' => ['index','show']]);
        $this->middleware('permission:reporte-create', ['only' => ['create','store']]);
        $this->middleware('permission:reporte-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:reporte-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        //
        $clinicas_servicios = ClinicaServicio::all();
        $areas=Area::all();
        $especialidads=Especialidad::all();
        $riesgos=Riesgo::all();
        $dependencias=Dependencium::all();
        $cargos=Cargo::all();

        return view('reportes/index', compact('clinicas_servicios','areas','especialidads','riesgos','dependencias','cargos'));
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
    public function store(Request $request)
    {
        $date = Carbon::now();
        $condicion=$request->get('condicion');

        if($condicion == 0)
        {
            $fechai=$request->get('fechai');
            $fechaf=$request->get('fechaf');
            $area=$request->get('areas');
            $especialidad=$request->get('especialidad');
            $clinica=$request->get('id_clinica_servicio');
            
            $exportResult=new ReportesExport([$fechai,$fechaf,$area,$especialidad,$clinica],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        if($condicion== 1)
        {
            $fechai=$request->get('fechai');
            $fechaf=$request->get('fechaf');
            $tipo_reporte=$request->get('reporte_colaborador');
            $seleccion=$request->get('seleccion');
            
            $exportResult=new ReportesExport([],[$fechai,$fechaf,$tipo_reporte,$seleccion]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
