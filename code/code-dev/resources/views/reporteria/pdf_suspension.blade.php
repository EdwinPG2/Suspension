<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="{{public_path('libs/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">-->
    <title>PDF</title>
</head>
<body>
    <br>
    <div align="center">Suspensiones efectuadas en {{$oficios->lugar}}, <div align="right">fecha:{{date('d-m-Y')}}</div></div>
    <br>
    <br>
    <br>
        Instituto Guatemalteco de Seguridad Social, Sede Quetzaltenango <br>
        Reporte de suspensiones por area <br>
        <br>
        <br>
        <table id="t-oficios" class="table table-hover" align="center" border="1">
            <thead>
                <th scope="col">Correlativo</th>
                <th scope="col">Inicio de suspension</th>
                <th scope="col">Fecha de fin suspension</th>
                <th scope="col">Fecha registrada</th>
                <th scope="col">Estado</th>
            </thead>
            
            <tbody>
                @foreach($ofi_susp as $item)
                                <tr class="table-active">
                                    <th scope="row">{{ $item->desuspension->id_suspension}}</th>
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension))}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension))}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_registro))}}</td>
                                    <td>{{  
                                    @foreach ($formularios as $item2 )
                                            @if ($item2->id_suspension == $item->id_suspension)
                                                {{ $item2->Formularios}}
                                            @endif
                                    @endforeach
                                    }}</td>
                                    <td>{{ $item->desuspension->estado}}</td>
                                </tr>
                    @endforeach                 
            </tbody>
        </table>
        <br>
            <div align="center">ATENTAMENTE,<br> <br> <br>
            F:_____________________________ <br>
                {{$oficios->destinatario}}
            </div>
</body>
</html>