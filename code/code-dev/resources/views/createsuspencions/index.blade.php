@extends('layouts.admin')

@section('titulo')
<span>Suspensiones</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de suspensiones</h4>
                    
                    @can('suspension-create')
                    <a type="button" class="btn btn-primary" href="{{ route('createsuspencions.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div align="left">
                        <h4>Seleccione que tipo de suspensiones desea ver:</h4>
                        <a href="{{route('createsuspencions.index')}}" class="btn btn-info">Registrados</a>
                        <a href="{{route('createsuspencions.rechazos')}}" class="btn btn-info">Rechazados</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-suspencions" class="table table-striped table-bordered dts">
                    <thead>
                        <!--<th>Id</th>-->
                        <th>No afiliación</th>
                        <th>Nombres</th>
                        <th>Fecha de inicio caso</th>
                        <th>Fecha de inicio suspensión</th>
                        <th>Fecha de fin suspensión</th>
                        <th>Fecha de alta</th>
                        <th>Clinica/Servicio</th>
                        <th>Observación</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($suspencions as $item)
                        <tr class="text-center">
                            <td>{{$item->afiliado->no_afiliado}}</td>
                            <td>{{$item->afiliado->nombre}} {{$item->afiliado->apellidos}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_inicio_caso)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_inicio_suspension)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_fin_suspension)) }}</td>
                            @if(date('d-m-Y', strtotime($item->fecha_alta)) != '31-12-1969')
                            <td>{{ date('d-m-Y', strtotime($item->fecha_alta)) }}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$item->clinica_servicio->nombre}}</td>
                            <td>{{ $item->observacion }}</td>
                            <td>{{ $item->estado }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_registro))}}</td>

                            <td>@if($item->estado=='Registrado')
                                @can('suspension-edit')
                                <a href="{{ route ('agregarformularios.show', $item->id_suspension) }}"
                                    class="btn btn-warning">Editar formularios</a>
                                <a href="{{ route ('createsuspencions.edit', $item->id_suspension) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('suspension-delete')
                                <form action="{{ route('createsuspencions.destroy',$item->id_suspension)}} " method ="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                                @endif
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

