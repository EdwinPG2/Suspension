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
                    <a type="button" class="btn btn-primary" href="{{ route('afiliados.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-afiliados" class="table table-striped table-bordered dts">
                    <thead>
                        <th>No. Afiliacion</th>
                        <th>CUI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Genero</th>
                        <th>Fecha de Nacimiento</th>
                        <th>IBM</th>
                        <th>Tipo de Afiliado</th>
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
                            <td>{{ $item->fecha_nacimiento }}</td>
                            <td>{{ $item->ibm }}</td>
                            <td>@foreach ($tipo as $item2 )
                                @if($item2->Id_tipo_afiliado==$item->id_tipo_afiliado)
                                {{$item2->nombre}}
                                @endif
                            @endforeach</td>
                            <td>
                                <a href="{{ route ('afiliados.edit', $item->no_afiliado) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('afiliados.destroy',$item->no_afiliado)}} " method ="post" class="d-inline">
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