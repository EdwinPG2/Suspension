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
                        <th>Id</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de registro</th>
                        <th>Observacion</th>
                        <th>Estado</th>
                        <th>No de afiliado</th>
                        <th>Clinica/servicio</th>
                        <th>Registrador</th>
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($suspencions as $item)
                        <tr class="text-center">
                            <td>{{ $item->id_suspension }}</td>
                            <td>{{ $item->fecha_inicio_suspension }}</td>
                            <td>{{ $item->fecha_fin_suspension }}</td>
                            <td>{{ $item->fecha_alta }}</td>
                            <td>{{ $item->fecha_registro }}</td>
                            <td>{{ $item->observacion }}</td>
                            <td>{{ $item->estado }}</td>
                            <td>{{$item->afiliado->no_afiliado}}</td>
                            <td>{{$item->clinica_servicio->nombre}}</td>
                            
                            <td>{{isset($item->usuario_registrador->nombres)?$item->usuario_registrador->nombres:''}}</td>
                            
                            
                            
                            <td>
                                <table>
                                        <td>
                                            <a href="{{ route ('createsuspencions.edit', $item->no_afiliado) }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('createsuspencions.destroy',$item->no_afiliado)}} " method ="post">
                                                @csrf
                                                    {{method_field('DELETE')}}
                                                    
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </td>
                                </table>
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

