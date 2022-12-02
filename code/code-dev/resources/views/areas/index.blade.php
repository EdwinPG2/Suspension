@extends('layouts.admin')

@section('titulo')
<span>Área</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de áreas</h4>
                    @can('area-create')
                        <a type="button" class="btn btn-primary" href="{{route('areas.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-areas" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($areas as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>
                                    <a href="{{ route ('areas.edit', $item->id_area) }}"
                                    class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                
                                    <form action="{{ route('areas.destroy',$item->id_area)}}" method="post" class="d-inline">
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