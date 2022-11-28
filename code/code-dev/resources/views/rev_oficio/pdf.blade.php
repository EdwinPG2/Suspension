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
            <img src="D:\Meso\ProyectoCarrera\IGSS\proyecto\PJIGSS\public\img\logo.jpg" alt="" width="100px" height="100px">
        </div>
        {{$ofi_susp[0]->desuspension->clinica_servicio->descripcion}}<br> {{$ofi_susp[0]->doficio->lugar}}, {{date('d-m-Y')}}
    </div>
    <br><br><br><br><br>
        Señores<br>
        Delegacion del IGSS Quetzaltenango <br>
        Ciudad <br>
        {{$ofi_susp[0]->doficio->saludo}}
        <br>
        <br>
        <br>
        <table id="t-oficios" class="table table-hover" align="center" border="1">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Afiliado</th>
                <th scope="col">Nombres y apellidos</th>
                <th scope="col">Documentos</th>
                <th scope="col">Fecha registrada</th>
                <th scope="col">Fecha inicio suspension</th>
                <th scope="col">Observación</th>
            </thead>
            
            <tbody>
                @foreach ($ofi_susp as $item)
                    @if($item->desuspension->estado != 'Rechazado')
                        <tr class="table-active">
                            <td>{{$item->desuspension->id_suspension}}</td>
                            <td >{{$item->desuspension->no_afiliado}}</td>
                            <td >{{$item->desuspension->afiliado->nombre}} {{$item->desuspension->afiliado->apellidos}}</td>
                            <td>
                                @foreach ($formularios as $item2 )
                                    @if ($item2->id_suspension == $item->id_suspension)
                                        {{ $item2->Formularios}}
                                    @endif
                                @endforeach
                            </td>
                            
                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_registro)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) }}</td>
                            <td>{{ $item->desuspension->observacion}}</td>
                            
                        </tr>
                    @endif
                @endforeach                 
            </tbody>
        </table>
        <br>
            <div align="center">ATENTAMENTE,<br> <br> <br>
            F:_____________________________ <br>
                {{Auth::user()->name}}, {{Auth::user()->apellido}}<!--Aqui va el ID del usuario logueado-->
            </div>
</body>
</html>