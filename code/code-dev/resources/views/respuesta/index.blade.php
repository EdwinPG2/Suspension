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
                                <a href="{{ route ('respuesta.show', $item->id_requerimiento) }}"
                                class="btn btn-warning" >Generar respuesta</a>
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