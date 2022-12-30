@extends('layouts.admin')

@section('titulo')
    <span>Archivados</span>
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h4>Suspensiones archivadas</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <!--<th>Id</th>-->
                            <th>No. afiliación</th>
                            <th>Nombres</th>
                            <th>Formularios</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Fecha de alta</th>
                            <th>Fecha de registro</th>
                            <th>Observación</th>
                            <th>Estado</th>
                            <th>Clínica/servicio</th>
                            <th>Oficio</th>
                            <!--<th>Registrador</th>-->
                            <!--<th style="height: auto">Opciones</th>-->
                        </thead>
                        <tbody>
                            @foreach ($fin as $item)
                                <tr class="text-center">
                                    <td>{{ $item->desuspension->afiliado->no_afiliado }}</td>
                                    <td>{{ $item->desuspension->afiliado->nombre }}
                                        {{ $item->desuspension->afiliado->apellidos }}</td>
                                    <td>
                                        @foreach ($formularios_suspencion as $item2)
                                            @if ($item2->id_suspension == $item->desuspension->id_suspension)
                                                {{ $item2->formulario->nombre }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <!--<td> $item->desuspension->id_suspension }}</td>-->
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension)) }}</td>
                                    @if (date('d-m-Y', strtotime($item->desuspension->fecha_alta)) != '31-12-1969')
                                        <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_alta)) }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_registro)) }}</td>
                                    <td>{{ $item->desuspension->observacion }}</td>
                                    <td>{{ $item->desuspension->estado }}</td>

                                    <td>{{ $item->desuspension->clinica_servicio->nombre }}</td>
                                    <td>
                                        @if ($item->doficio->correlativo <= 9)
                                            000{{ $item->doficio->correlativo }}
                                        @elseif($item->doficio->correlativo <= 99)
                                            00{{ $item->doficio->correlativo }}
                                        @elseif($item->doficio->correlativo <= 990)
                                            0{{ $item->doficio->correlativo }}
                                        @endif
                                        /
                                        {{ $item->doficio->fecha->translatedFormat('Y') }}
                                        {{ $item->doficio->dclinica_servicio->descripcion }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
