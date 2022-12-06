@extends('layouts.admin')

@section('titulo')
<span>Tipos de Afiliados</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de tipos de afiliados</h4>
                    @can('tipo_afiliado-create')
                    <a type="button" class="btn btn-primary" href="{{route('tipo_afiliados.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-tipo_afiliados" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($tipo_afiliados as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>
                                @can('tipo_afiliado-edit')
                                <a href="{{ route ('tipo_afiliados.edit', $item->Id_tipo_afiliado) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('tipo_afiliados.destroy',$item->Id_tipo_afiliado)}} " method ="post" class="d-inline">
                                @endcan
                                @can('tipo_afiliado-delete')
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