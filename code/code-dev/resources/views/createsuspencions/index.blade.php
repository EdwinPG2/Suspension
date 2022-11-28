@extends('layouts.admin')

@section('titulo')
<span>Suspenciones</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de suspenciones</h4>
                    <a type="button" class="btn btn-primary" href="{{ route('createsuspencions.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-suspencions" class="table table-striped table-bordered dts">
                    <thead>
                        <!--<th>Id</th>-->
                        <th>No afiliacion</th>
                        <th>Formularios</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de registro</th>
                        <th>Observacion</th>
                        <th>Estado</th>
                        
                        <th>Clinica/servicio</th>
                        <!--<th>Registrador</th>-->
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($suspencions as $item)
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
                            <td>{{ date('y-m-d', strtotime($item->fecha_inicio_suspension)) }}</td>
                            <td>{{ date('y-m-d', strtotime($item->fecha_fin_suspension)) }}</td>
                            <td>{{ date('y-m-d', strtotime($item->fecha_alta)) }}</td>
                            <td>{{ date('y-m-d', strtotime($item->fecha_registro))}}</td>
                            <td>{{ $item->observacion }}</td>
                            <td>{{ $item->estado }}</td>
                            
                            <td>{{$item->clinica_servicio->nombre}}</td>
                            
                            <!--<td> isset($item->usuario_registrador->nombres)?$item->usuario_registrador->nombres:''}}</td>-->
                            <td>
                                <a href="{{ route ('agregarformularios.show', $item->id_suspension) }}"
                                    class="btn btn-warning">Editar formularios</a>
                                <a href="{{ route ('createsuspencions.edit', $item->id_suspension) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('createsuspencions.destroy',$item->id_suspension)}} " method ="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
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

