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
    <div align="right">
        <div align="left">
            <img src="..\public\img\logo.jpg" alt="" width="100px" height="100px">
        </div>
        @if($ofi_susp->isNotEmpty())
        {{$ofi_susp[0]->doficio->dclinica_servicio->descripcion}}-{{$ofi_susp[0]->doficio->correlativo}}
        @endif
        <br> {{$oficio->lugar}}, {{date('d-m-Y')}}</div>
    <br><br><br><br><br>
        Señores<br>
        {{$oficio->destinatario}} <br>
        {{$oficio->lugar}} <br>
        <br>
        <br>
        {{$oficio->saludo}}
        <br>
        <br>
        <br>
        <table id="t-oficios" class="table table-hover" align="center" border="1">
            <thead>

                <th scope="col">No. Afiliado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha inicio caso</th>
                <th scope="col">Fecha inicio suspension</th>
                <th scope="col">Fecha fin suspension</th>
                <th scope="col">Fecha alta</th>
                <th scope="col">Clinica-Servicio</th>
                <th scope="col">Observación</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de Registro</th>
            </thead>
            
            <tbody>

                @foreach ($ofi_susp as $item)
                        <tr class="table-active">
                            <td>{{$item->desuspension->no_afiliado}}</td>
                            <td>{{$item->desuspension->afiliado->nombre}} {{$item->desuspension->afiliado->apellidos}}</td>
                            <td>{{$item->desuspension->fecha_inicio_caso}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension))}}</td>
                            <td>{{ date('d-M-y', strtotime($item->desuspension->fecha_alta))}}</td>
                            <td>{{$item->desuspension->clinica_servicio->nombre}}</td>
                            <td>{{$item->desuspension->observacion}}</td>
                            <td>{{$item->desuspension->estado}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_registro)) }}</td>
                            
                            
                        </tr>
                        @endforeach              
            </tbody>
        </table>
        <br>
        <br>
        {{$oficio->despedida}}
        <br>
        <br>
        <br>
        <br>
        <br>
        
            <div align="center">ATENTAMENTE,<br> <br> <br>
            F:_____________________________ <br>
            {{Auth::user()->name}}, {{Auth::user()->apellido}}
            </div>
</body>
</html>