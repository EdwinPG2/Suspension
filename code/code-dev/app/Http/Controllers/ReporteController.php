<?php

namespace App\Http\Controllers;

use App\Models\ClinicaServicio;
use App\Models\Area;
use App\Models\Especialidad;
use App\Models\Riesgo;
use App\Models\Dependencium;
use App\Models\Cargo;
use App\Models\User;

use Illuminate\Http\Request;
use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class ReporteController extends Controller
{
    
    
    public function index()
    {
        //
        $clinicas_servicios = ClinicaServicio::all();
        $areas=Area::all();
        $especialidads=Especialidad::all();
        $riesgos=Riesgo::all();
        $dependencias=Dependencium::all();
        $cargos=Cargo::all();
        $usuarios=User::all();

        return view('reportes/index', compact('clinicas_servicios','areas','especialidads','riesgos','dependencias','cargos','usuarios'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $date = Carbon::now();
        $condicion=$request->get('condicion');

        if($condicion == 0)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $area=$request->get('areas');
            $especialidad=$request->get('especialidad');
            $clinica=$request->get('id_clinica_servicio');
            
            $exportResult=new ReportesExport([$fechai,$fechaf,$area,$especialidad,$clinica],[],[],[],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        if($condicion== 1)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $tipo_reporte=$request->get('reporte_colaborador');
            $seleccion=$request->get('seleccion');
            
            $exportResult=new ReportesExport([],[$fechai,$fechaf,$tipo_reporte,$seleccion],[],[],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }

        if($condicion== 2)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $registrador=$request->get('usuario');
            
            $exportResult=new ReportesExport([],[],[$fechai,$fechaf,$registrador,null,null,null,null],[],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        if($condicion== 3)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $revisor=$request->get('usuario');
            
            $exportResult=new ReportesExport([],[],[$fechai,$fechaf,null,$revisor,null,null,null],[],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }

        if($condicion== 4)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $revisor=$request->get('usuario');
            $area=$request->get('areas2');
            $especialidad=$request->get('especialidad2');
            $clinica=$request->get('id_clinica_servicio2');
            
            $exportResult=new ReportesExport([],[],[$fechai,$fechaf,null,null,$area,$especialidad,$clinica],[],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        
        if($condicion== 5)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $requerimiento=$request->get('requerimiento');
            
            $exportResult=new ReportesExport([],[],[],[$fechai,$fechaf,$requerimiento],[]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
        if($condicion== 6)
        {
            $fechai=$request->get('fechai');
            $fechaf=(new Carbon($request->get('fechaf')))->addDays(1); 
            $pago=$request->get('pago');
            
            $exportResult=new ReportesExport([],[],[],[],[$fechai,$fechaf,$pago]);
    
            $data = Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    
            return $data;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
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
