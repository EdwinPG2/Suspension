<?php

namespace App\Exports;

use app\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ReportesExport implements FromView, ShouldAutoSize
{

    protected $data;
    protected $item;
    

    public function __construct(array $data,array $item)
    {
        $this->data = $data;
        $this->item = $item;
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

        

        //$result = $this->data;
        ////$result =DB::select("call suspenciones_general('".$this->data[0]."','".$this->data[1]."')");
        //$result =DB::select('call formularios_suspencion(5)');
        //$result=DB::select('select * from afiliado');
        ////$collection = collect($result);
        ////return $collection;
        //return User::all();
    }
}
