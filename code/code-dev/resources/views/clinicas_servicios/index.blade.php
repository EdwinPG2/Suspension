@extends('layouts.admin')

@section('titulo')
<span>Clinicas Servicios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de clinicas servicios</h4>
                    @can('clinita-create')
                    <a type="button" class="btn btn-primary" href="{{ route('clinicas_servicios.create') }}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-clinicas_servicios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Correlativo</th>
                        <th>Área</th>
                        <th>Especialidad</th>
                        <th> Opciones </th>
                    </thead>
                    <tbody>
                        @foreach($clinicas_servicios as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $item->area->nombre }}</td>
                            <td>{{ $item->especialidad->nombre_especialidad }}</td>
                            <td colspan="2">
                                <a href="{{ route ('clinicas_servicios.edit', $item-> id_clinica_servicio) }}"
                                class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                <form action="{{ route('clinicas_servicios.destroy',$item-> id_clinica_servicio)}}" method="post" class="d-inline">
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