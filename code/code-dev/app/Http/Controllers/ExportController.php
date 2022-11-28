<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportesExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    //
    public function exportResult(Request $request)
    {
        $date = Carbon::now();
        
        $exportResult=new ReportesExport(['2016-03-20','2023-03-20']);

        return redirect()->route('reporte.index');
        return Excel::download($exportResult, 'Reporte'.$date->toDateTimeString().'.xlsx');
    }
}
