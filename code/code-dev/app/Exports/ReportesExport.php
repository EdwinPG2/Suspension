<?php

namespace App\Exports;

use app\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ReportesExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView, ShouldAutoSize, WithCustomValueBinder
{

    protected $data;
    protected $item;
    protected $rechazos;
    protected $requerimiento;
    protected $pago;
    

    public function __construct(array $data,array $item, array $rechazos,array $requerimiento,array $pago)
    {
        $this->data = $data;
        $this->item = $item;
        $this->rechazos = $rechazos;
        $this->requerimiento = $requerimiento;
        $this->pago = $pago;
    }
    public function view():View
    {
        if($this->data!=null){
        
        $fechai=$this->data[0];
        $fechaf=$this->data[1];
        $area=$this->data[2];
        $especialidad=$this->data[3];
        $clinica=$this->data[4];
        
        if($clinica!=null)
        {
            $result =DB::select("call suspenciones_clinicas_servicios('".$fechai."','".$fechaf."',".$clinica.")");
            $collection = collect($result);

        return view('report.data',[
            'data' => $collection
        ]);
        }
        elseif ($especialidad!=null) {
            $result =DB::select("call suspenciones_especialidades('".$fechai."','".$fechaf."',".$especialidad.")");
            $collection = collect($result);
            return view('report.data',[
                'data' => $collection
            ]);
        }
        elseif($area!=null){
            $result =DB::select("call suspenciones_areas('".$fechai."','".$fechaf."',".$area.")");
            $collection = collect($result);

        return view('report.data',[
            'data' => $collection
        ]);
        }
        else {
            $result =DB::select("call suspenciones_general('".$fechai."','".$fechaf."')");
            $collection = collect($result);

        return view('report.data',[
            'data' => $collection
        ]);
        }
        }
        elseif($this->item!=null)
        {
            $fechai=$this->item[0];
            $fechaf=$this->item[1];
            $tipo_reporte=$this->item[2];
            $seleccion=$this->item[3];
            if($tipo_reporte==1)
            {
                $result =DB::select("call suspenciones_colaborador_riesgo('".$fechai."','".$fechaf."',".$seleccion.")");
                $collection = collect($result);

                return view('report.data',[
                'data' => $collection
                ]);
            }
            elseif($tipo_reporte==2)
            {
                $result =DB::select("call suspenciones_colaborador_dependencia('".$fechai."','".$fechaf."',".$seleccion.")");
                $collection = collect($result);

                return view('report.data',[
                'data' => $collection
                ]);
            }
            elseif($tipo_reporte==3)
            {
                $result =DB::select("call suspenciones_colaborador_cargo('".$fechai."','".$fechaf."',".$seleccion.")");
                $collection = collect($result);

                return view('report.data',[
                'data' => $collection
                ]);
            }
        }
        elseif($this->rechazos!=null)
        {
            $fechai=$this->rechazos[0];
            $fechaf=$this->rechazos[1];
            $registrador=$this->rechazos[2];
            $revisor=$this->rechazos[3];
            $area=$this->rechazos[4];
            $especialidad=$this->rechazos[5];
            $clinica=$this->rechazos[6];
            if($registrador!=null)
            {
                $result =DB::select("call rechazos_registrador('".$fechai."','".$fechaf."',".$registrador.")");
                $collection = collect($result);

                return view('report.rechazos',[
                'data' => $collection
                ]);
            }
            elseif($revisor=!null)
            {
                $result =DB::select("call rechazos_revisor('".$fechai."','".$fechaf."',".$revisor.")");
                $collection = collect($result);

                return view('report.rechazos',[
                'data' => $collection
                ]);
            }
            if($clinica!=null)
            {
                $result =DB::select("call rechazos_clinicas_servicios('".$fechai."','".$fechaf."',".$clinica.")");
                $collection = collect($result);

            return view('report.rechazos',[
                'data' => $collection
            ]);
            }
            elseif ($especialidad!=null) {
                $result =DB::select("call rechazos_especialidad('".$fechai."','".$fechaf."',".$especialidad.")");
                $collection = collect($result);
                return view('report.rechazos',[
                    'data' => $collection
                ]);
            }
            elseif($area!=null){
                $result =DB::select("call rechazos_area('".$fechai."','".$fechaf."',".$area.")");
                $collection = collect($result);

            return view('report.rechazos',[
                'data' => $collection
            ]);
            }
            
        }
        elseif($this->requerimiento!=null)
        {
            $fechai=$this->requerimiento[0];
            $fechaf=$this->requerimiento[1];
            $requerimiento=$this->requerimiento[2];
            
            if($requerimiento=='generado')
            {
                $result =DB::select("call requerimientos_enviados('".$fechai."','".$fechaf."')");
                $collection = collect($result);

            return view('report.requerimientos',[
                'data' => $collection
            ]);
            }
            elseif ($requerimiento=='espera') {
                $result =DB::select("call requerimientos_en_espera('".$fechai."','".$fechaf."')");
                $collection = collect($result);
                return view('report.requerimientos',[
                    'data' => $collection
                ]);
            }
            elseif ($requerimiento=='respondido') {
                $result =DB::select("call requerimientos_respondidos('".$fechai."','".$fechaf."')");
                $collection = collect($result);
                return view('report.requerimientos',[
                    'data' => $collection
                ]);
            }
            
        }
        elseif($this->pago!=null)
        {
            $fechai=$this->pago[0];
            $fechaf=$this->pago[1];
            $pag=$this->pago[2];
            
            $result=null;
            if($pag=='SI')
            {
                $result =DB::select("call suspenciones_si_pago('".$fechai."','".$fechaf."')");
            }
            elseif($pag=='NO')
            {
                $result =DB::select("call suspenciones_no_pago('".$fechai."','".$fechaf."')");
            }
            
            $collection = collect($result);

            return view('report.data',[
                'data' => $collection
            ]);
            
            
        }

        

        //$result = $this->data;
        ////$result =DB::select("call suspenciones_general('".$this->data[0]."','".$this->data[1]."')");
        //$result =DB::select('call formularios_suspencion(5)');
        //$result=DB::select('select * from afiliado');
        ////$collection = collect($result);
        ////return $collection;
        //return User::all();
    }
}
