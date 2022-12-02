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
                    <a type="button" class="btn btn-primary" href="{{ route('requerimientos.create') }}"><i class="fas fa-plus"> </i> Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-requerimientos" class="table table-striped table-bordered dts">
                    <thead>
                        <th> Numero de requerimiento </th>
                        <th> Fecha de Requerimiento </th>
                        <th> Fecha de envio </th>
                        <th> Estado </th>
                        <th> Observaciones </th>
                        <th> Fecha Recepcion </th>
                    </thead>
                    <tbody>
                        @foreach($requerimientos as $item)
                        <tr class="text-center">
                            <td>{{ $item->no_requerimiento }}</td>
                            <td>{{ $item->fecha_requerimiento }}</td>
                            <td>{{ $item->fecha_envio }}</td>
                            <td>{{ $item->estado }}</td>
                            <td>{{ $item->observaciones }}</td>
                            <td>{{ $item->fecha_recepcion_regmed }}</td>
                            <td>{{ $item->oficio->id_oficio }}</td>
                            <td>{{ $item->afiliado->no_afiliado }}</td>
                            <td>{{ $item->usuario->nombres }}</td>
                            <td>{{ $item->usuario->nombres }}</td>

                            
                            <td colspan="2">
                                <a href="{{ route ('requerimientos.edit', $item-> id_requerimiento) }}"
                                class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                <form action="{{ route('requerimientos.destroy',$item-> id_requerimiento)}}" method="post" class="d-inline">
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