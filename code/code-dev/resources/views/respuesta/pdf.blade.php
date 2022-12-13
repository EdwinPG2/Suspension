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


    <img style="position:absolute;top:-0.2in;left:-0.18in;width:1.12in;height:1.07in" src="..\public\img\logo.png" />
    <div style="position:absolute;top:0.0in;left:25%;width:4.12in;line-height:0.22in;"><span
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
                CASOS-REGMED
                <br>
                OFICIO No.
                @if ($requerimiento->correlativo <= 9)
                        000{{ $requerimiento->correlativo }}
                    @elseif($requerimiento->correlativo <= 99)
                        00{{ $requerimiento->correlativo }}
                    @elseif($requerimiento->correlativo <= 990)
                        0{{ $requerimiento->correlativo }}
                    @endif
                /
                {{ $requerimiento->fecha_respuesta->translatedFormat('Y') }}

            </span>
            <br>
            <span style="font-style:normal;font-weight:normal;font-size:11pt;font-family:Century Gothic;color:#000000">
                Quetzaltenango,
                {{ $requerimiento->fecha_respuesta->translatedFormat('d') }}
                de
                {{ $requerimiento->fecha_respuesta->translatedFormat('F') }}
                de
                {{ $requerimiento->fecha_respuesta->translatedFormat('Y') }}

            </span>
        </DIV>

    </div>
    <div style="position:absolute;top:1.97in;left:0.29in;width:100%;line-height:0.20in;text-align:center"><span
            style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">
            AFILIADO:{{ $requerimiento->afiliado->nombre }} {{ $requerimiento->afiliado->apellidos }}
            <br>
            CASO No. {{ $requerimiento->caso }}
            <br>
            REQUERIMIENTO: {{ $requerimiento->no_requerimiento }}

        </span>


    </div>
    <div style="position:absolute;top:2.97in;left:0.29in;width:3.46in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:bold;font-size:11pt;font-family:Century Gothic;color:#000000">Señor
            (a)
            <br>

        </span>
        {{ $requerimiento->desino_nombre }}
        <br>
        {{ $requerimiento->destino_area }}
        <br>
        {{ $requerimiento->destino_lugar }}

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
    <div style="position:absolute;top:4.0in;left:0.29in;width:7in;line-height:0.20in;"><span
            style="font-style:normal;font-weight:Normal;font-size:11pt;font-family:Century Gothic;color:#000000">
            Estimados señor (a):
            <br>
            <br>
            {{ $requerimiento->cuerpo }}
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

    <div style="position:absolute;width:50%; top:7.2in;line-height:0.20in;text-align:center">
        {{ $requerimiento->nombre_usuario }},<br>
        {{ $requerimiento->cargo->nombre }}
        <br>Registros Médicos
        <br>IGSS, Hospital General de Quetzaltenango <br>
    </div>

    <div style="position:absolute;width:50%; top:8.2in;line-height:0.20in;text-align:center;float:right">
        Vo.Bo. {{ $requerimiento->vobo }}
        <br>Supervisor(a)/Registros Médicos
        <br>IGSS, Hospital General de Quetzaltenango <br>
    </div>

    <div style="position:absolute;top:8.6in;left:0.29in;width:1.3in;line-height:0.20in;background-color: lightgray; text-align:center;"><span
            style="font-style:normal;font-weight:bold;font-size:12pt;font-family:Century Gothic;color:#000000">
            Anexo: {{ $requerimiento->folios }} folios
        </span>
    </div>

    <img style="position:absolute;top:9.7in;left:-0.5in;width:9.32in;height:0.69in;display: inline-block"
        src="..\public\img\pie.png" />
    <div style="position:absolute;top:9.6in;width:100%;line-height:0.20in;text-align:center"><span
            style="font-style:normal;font-weight:Normal;font-size:11pt;font-family:Century Gothic;color:#000000">
            5ta. Avenida 1-79 zona 5 Quetzaltenango
            <br>Tel. 7829 1200
            <br>
            www.igssgt.org
        </span>
    </div>


</body>

</html>
