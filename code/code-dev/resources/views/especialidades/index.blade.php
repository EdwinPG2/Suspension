@extends('layouts.admin')

@section('titulo')
<span>Especialidades</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de especialidades</h4>
                    @can('especialidad-create')
                        <a type="button" class="btn btn-primary" href="{{route('especialidades.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-especialidades" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th> Opciones </th>
                    </thead>
                    <tbody>
                        @foreach($especialidades as $item)
                        <tr class="text-center">
                            <td>{{ $item->id_especialidad }}</td>
                            <td>{{ $item->nombre_especialidad }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td colspan="2 flex justify-center">
                                @can('especialidad-edit')
                                    <a href="{{ route ('especialidades.edit', $item->id_especialidad) }}"
                                    class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('especialidad-delete')
                                    <form action="{{ route('especialidades.destroy',$item->id_especialidad)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit" class="d-inline"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endcan
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