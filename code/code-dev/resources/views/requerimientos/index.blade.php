@extends('layouts.admin')

@section('titulo')
<span>Requerimientos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de requerimientos</h4>
                    @can('requerimiento-create')
                    <a type="button" class="btn btn-primary" href="{{ route('requerimientos.create') }}"><i class="fas fa-plus"> </i> Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-requerimientos" class="table table-striped table-bordered dts">
                    <thead>
                        <th> Número de requerimiento </th>
                        <th> Fecha de requerimiento </th>
                        <th> Fecha de envio </th>
                        <th> Estado </th>
                        <th> Observaciones </th>
                        <th> Documento</th>
                        <th> Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($requerimientos as $item)
                        <tr class="text-center">
                            <td>{{ $item->no_requerimiento }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_requerimiento)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha_envio)) }}</td>
                            <td>{{ $item->estado }}</td>
                            <td>{{ $item->observaciones }}</td>
                            <td><a href="archivos/{{$item->archivo}}" target="blank_">Ver documento</a></td>
                            <td colspan="2">
<<<<<<< HEAD
                                @can('requerimiento-edit')
=======
                                @if($item->estado == 'Generado')
>>>>>>> 71d66d4d1b7cdad3bfa3b2162a8c6ccc7edcdb39
                                <a href="{{ route ('requerimientos.edit', $item-> id_requerimiento) }}"
                                class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                <form action="{{ route('requerimientos.destroy',$item-> id_requerimiento)}}" method="post" class="d-inline">
                                @endcan
                                @can('requerimiento-delete')
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
<<<<<<< HEAD
                                @endcan
=======
                                @endif
                                @if ($item->estado == 'Resuelto')
                                <a href="{{ route('respuesta.edit', $item->id_requerimiento) }}" class="btn btn-success" target="_blank"><i class="fas fa-check-circle"></i> Respuesta</a>
                                @endif
>>>>>>> 71d66d4d1b7cdad3bfa3b2162a8c6ccc7edcdb39
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