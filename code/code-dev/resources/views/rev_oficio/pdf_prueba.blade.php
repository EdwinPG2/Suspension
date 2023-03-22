<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link href="{{ public_path('libs/css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">-->
    <title>PDF</title>
    <style>
        table {
            width: 100%;
            border: 0px solid #000;
            border-spacing: 0px;
            border-collapse: collapse;

        }

        th,
        td {
            vertical-align: top;
            border: 0.01px solid #000;
            text-align: center;
            border-collapse: collapse;
        }
    </style>
</head>

<body>


   <!-- <img style="position:absolute;top:-0.2in;left:-0.18in;width:1.12in;height:1.07in" src="{{ url('img/logo.png')}}" />
   --><div style="position:absolute;top:0.0in;left:25%;width:4.12in;line-height:0.22in;"><span
            style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Arial;color:#205784">Instituto
            Guatemalteco de Seguridad Social</span><br />
    </div>
    <div style="position:absolute;top:0.2in;width:100%;line-height:0.25in;text-align:center;"><span
            style="font-style:normal;font-weight:normal;font-size:12pt;font-family:CG Omega;color:#000000">HOSPITAL
            GENERAL QUETZALTENANGO</span><span
            style="font-style:normal;font-weight:normal;font-size:12pt;font-family:CG Omega;color:#000000">
        </span><br />
        <DIV style="position:relative;"><span
                style="font-style:normal;font-weight:normal;font-size:12pt;font-family:CG Omega;color:#000000">REGISTROS
                MÉDICOS</span><span
                style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Arial;color:#205784">
            </span><br /></SPAN></DIV>
    </div>

    <!--
    <div style="position:absolute;top:0.94in;left:1.84in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:bold;text-align:center; font-size:12pt;font-family:Times New Roman;color:#ff0000">OFICIO
            DE SECRETARIAS A REVISORAS </span><span
            style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Times New Roman;color:#ff0000">
        </span><br /></SPAN></div>
    -->

    <div style="position:absolute;top:1.2in;text-align:right;left:0.84in;;width:3.53in;line-height:0.20in;">
        <DIV style="position:relative; left:2.75in;"><span
                style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">
                @if ($ofi_susp->isNotEmpty())
                    {{ $ofi_susp[0]->doficio->dclinica_servicio->descripcion }}
                @endif
                <br>
                OFICIO No. @if ($ofi_susp->isNotEmpty())
                    @if ($ofi_susp[0]->doficio->correlativo <= 9)
                        000{{ $ofi_susp[0]->doficio->correlativo }}
                    @elseif($ofi_susp[0]->doficio->correlativo <= 99)
                        00{{ $ofi_susp[0]->doficio->correlativo }}
                    @elseif($ofi_susp[0]->doficio->correlativo <= 990)
                        0{{ $ofi_susp[0]->doficio->correlativo }}
                    @endif
                    /
                    {{ $ofi_susp[0]->doficio->fecha->translatedFormat('Y') }}
                @endif
            </span>
            <br>
            <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Century Gothic;color:#000000">
                Quetzaltenango,
                {{ $ldate = date('d')}} 
                de
                @switch($ldate = date('m'))
                    @case('01')
                        Enero
                        @break
                    @case('02')
                        Febrero
                    @break
                    @case('03')
                        Marzo
                    @break
                    @case('04')
                        Abril
                    @break
                    @case('05')
                        Mayo
                    @break
                    @case('06')
                        Junio
                    @break
                    @case('07')
                        Julio
                    @break
                    @case('08')
                        Agosto
                    @break
                    @case('09')
                        Septiempre
                    @break
                    @case('10')
                        Octubre
                    @break
                    @case('11')
                        Noviembre
                    @break
                    @case('12')
                        Diciembre
                    @break
                    @default
                @endswitch
                de
                 {{ $ldate = date('Y')}} 

            </span>
        </DIV>

    </div>
    <div style="position:absolute;top:1.97in;left:0.29in;width:3.46in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">Señores
            (as)
            <br>
            Prestaciones en Dinero
            <br>
            Delegación, IGSS Quetzaltenango
            <!--{{ $oficio->lugar }}-->
            <br>
            
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
    <div style="position:absolute;top:3.0in;left:0.29in;width:7in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:Normal;font-size:11pt;font-family:Century Gothic;color:#000000">
            Estimados señores (as):
            <br>
            {{ $oficio->saludo }}
        </span>
    </div>
    <br>
    <br>
    <br>
    <br>
    <table id="t-oficios" class="">
        <thead>
            <td width="22">No.</td>
            <td width="57">Afiliación</td>
            <td width="75">Nombre</td>
            <td width="63">Fecha de inicio de caso</td>
            <td width="63">Fecha de accidente</th>
            <td width="63">Fecha fin suspension DEL/AL</td>
            <td width="63">Fecha alta</td>
            <td>Estado</td>
            <td width="auto">Formularios</td>
        </thead>

        <tbody>

            @foreach ($ofi_susp as $key => $item)
            @if($item->desuspension->estado == 'Aceptado')
                <tr class="">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->desuspension->no_afiliado }}</td>
                    <td>{{ $item->desuspension->afiliado->nombre }} {{ $item->desuspension->afiliado->apellidos }}
                    </td>
                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_caso)) }}</td>
                    @if (date('d-m-Y', strtotime($item->desuspension->fecha_accidente)) != '31-12-1969')
                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_accidente)) }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>@if (date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) != '31-12-1969') {{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) }}@endif /
                        @if(date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension)) != '31-12-1969'){{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension)) }}@endif</td>
                    @if (date('d-m-Y', strtotime($item->desuspension->fecha_alta)) != '31-12-1969')
                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_alta)) }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ $item->desuspension->estado}}</td>
                    <td>
                        @foreach ($formularios as $item2)
                            @if ($item2->id_suspension == $item->id_suspension)
                                {{ $item2->Formularios }}
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <br>
    <div style="position:absolute;left:0.29in;width:100%;line-height:0.20in;"><span
            style="font-style:normal;font-weight:Normal;font-size:11pt;font-family:Century Gothic;color:#000000">
            {{ $oficio->despedida }}
        </span>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="position:absolute;width:100%; top:8.3in;line-height:0.20in;text-align:center">
        {{ $oficio->usuario->name}} {{ $oficio->usuario->apellido}},<br>
        Registros Médicos
        <br>IGSS, Hospital General de Quetzaltenango <br>
    </div>

       <!--<img style="position:absolute;top:9.7in;left:-0.5in;width:9.32in;height:0.69in;display: inline-block"
            src="{{ url('img/pie.png')}}"/>
       --><div style="position:absolute;top:9.6in;width:100%;line-height:0.20in;text-align:center"><span
                style="font-style:normal;font-weight:Normal;font-size:11pt;font-family:Century Gothic;color:#000000">
                5ta. Avenida 1-79 zona 5 Quetzaltenango
                <br>Tel. 7829 1200
                <br>
                www.igssgt.org
            </span>
        </div>
        

</body>

</html>
