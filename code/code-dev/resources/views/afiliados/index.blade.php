@extends('layouts.admin')

@section('titulo')
<span>Afiliados</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de afiliados</h4>
                    @can('afiliado-create')
                    <a type="button" class="btn btn-primary" href="{{ route('afiliados.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-afiliados" class="table table-striped table-bordered dts">
                    <thead>
                        <th>No. Afiliacion</th>
                        <th>CUI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Género</th>
                        <th>Fecha de Nacimiento</th>
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($afiliados as $item)
                        <tr class="text-center">
                            <td>{{ $item->no_afiliado }}</td>
                            <td>{{ $item->cui }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->apellidos }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->direccion }}</td>
                            <td>{{ $item->genero }}</td>
                            @if(date('d-m-Y', strtotime($item->fecha_nacimiento)) != '31-12-1969')
                            <td>{{ date('d-m-Y', strtotime($item->fecha_nacimiento)) }}</td>
                            @else
                            <td></td>
                            @endif

                            <td>
                                @can('afiliado-edit')
                                <a href="{{ route ('afiliados.edit', $item->no_afiliado) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('afiliados.destroy',$item->no_afiliado)}} " method ="post" class="d-inline">
                                @endcan
                                @can('afiliado-delete')
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