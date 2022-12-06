<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="{{ public_path('libs/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">-->
    <title>PDF</title>

</head>

<body>


    <img style="position:absolute;top:-0.2in;left:-0.18in;width:1.12in;height:1.07in" src="..\public\img\logo.png" />
    <div style="position:absolute;top:0.0in;left:25%;width:4.12in;line-height:0.22in;"><span
            style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Arial;color:#205784">Instituto
            Guatemalteco de Seguridad Social</span><br />
    </div>
    <div style="position:absolute;top:0.2in;left:29%;width:3.31in;line-height:0.25in;"><span
            style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#000000">HOSPITAL
            GENERAL QUETZALTENANGO</span><span
            style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#000000">
        </span><br />
        <DIV style="position:relative; left:0.9in;"><span
                style="font-style:normal;font-weight:normal;font-size:12pt;font-family:Segoe UI;color:#000000">REGISTROS
                MÉDICOS</span><span
                style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Arial;color:#205784">
            </span><br /></SPAN></DIV>
    </div>


    <div style="position:absolute;top:1.54in;left:1.84in;width:3.67in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Times New Roman;color:#ff0000">OFICIO
            DE SECRETARIAS A REVISORAS </span><span
            style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Times New Roman;color:#ff0000">
        </span><br /></SPAN></div>

    <div style="position:absolute;top:1.95in;text-align:right;left:0.84in;;width:3.53in;line-height:0.20in;">
        <DIV style="position:relative; left:2.75in;"><span
                style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">
                @if ($ofi_susp->isNotEmpty())
                    {{ $ofi_susp[0]->doficio->dclinica_servicio->descripcion }}
                @endif
                <br>
                OFICIO No. @if ($ofi_susp->isNotEmpty())
                    {{ $ofi_susp[0]->doficio->correlativo }}
                @endif
            </span>
            <br>
            <span
                style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Century Gothic;color:#000000">
                {{$oficio->lugar}}, {{date('d-m-Y')}}</span>
        </DIV>

    </div>
    <div style="position:absolute;top:2.97in;left:0.29in;width:3.46in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">Señores
            (as) 
        <br>
        Analistas de Suspensiones 
        <br>
        Registros Médicos
        <br>
        {{$oficio->lugar}}
        </span>
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
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
