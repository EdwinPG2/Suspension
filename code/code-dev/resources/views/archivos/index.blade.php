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
                        <th>No afiliación</th>
                        <th>Formularios</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de registro</th>
                        <th>Observación</th>
                        <th>Estado</th>
                        
                        <th>Clínica/servicio</th>
                        <!--<th>Registrador</th>-->
                        <!--<th style="height: auto">Opciones</th>-->
                    </thead>
                    <tbody>
                        @foreach($suspencions as $item)
                        @if($item->estado == 'Archivado')
                        <tr class="text-center">
                            <td>{{$item->afiliado->no_afiliado}}</td>
                            <td>
                                @foreach ($formularios_suspencion as $item2)
                                @if ($item2->id_suspension == $item->id_suspension)
                                {{$item2->formulario->nombre}}
                                @endif
                                @endforeach
                            </td>
                            
                            <!--<td> $item->id_suspension }}</td>-->
                            <td>{{ date('d-m-y', strtotime($item->fecha_inicio_suspension)) }}</td>
                            <td>{{ date('d-m-y', strtotime($item->fecha_fin_suspension)) }}</td>
                            @if (date('d-m-Y', strtotime($item->fecha_alta)) != '31-12-1969')
                                                <td>{{ date('d-m-Y', strtotime($item->fecha_alta)) }}</td>
                                            @else
                                                <td></td>
                                            @endif
                            <td>{{ date('d-m-y', strtotime($item->fecha_registro))}}</td>
                            <td>{{ $item->observacion }}</td>
                            <td>{{ $item->estado }}</td>
                            
                            <td>{{$item->clinica_servicio->nombre}}</td>
                        </tr>
                        @endif
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

