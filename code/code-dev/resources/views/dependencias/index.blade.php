@extends('layouts.admin')

@section('titulo')
<span>Dependencias</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de dependencias</h4>
                    @can('dependencia-create')
                        <a type="button" class="btn btn-primary" href="{{route('dependencias.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-dependencias" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th> Opciones </th>
                    </thead>
                    <tbody>
                        @foreach($dependencias as $item)
                        <tr class="text-center">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td colspan="2 flex justify-center">
                                @can('dependencia-edit')
                                    <a href="{{ route ('dependencias.edit', $item->id_dependencia) }}"
                                    class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('dependencia-delete')
                                    <form action="{{ route('dependencias.destroy',$item->id_dependencia)}}" method="post" class="d-inline">
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