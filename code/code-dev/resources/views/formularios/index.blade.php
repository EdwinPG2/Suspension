@extends('layouts.admin')

@section('titulo')
<span>Formularios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de formularios</h4>
                    @can('formulario-create')
                    <a type="button" class="btn btn-primary" href="{{route('formularios.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($formularios as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>
                                @can('formulario-edit')
                                <a href="{{ route ('formularios.edit', $item->id_formulario) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('formulario-delete')
                                <form action="{{ route('formularios.destroy',$item->id_formulario)}} " method ="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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