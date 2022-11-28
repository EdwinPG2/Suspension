@extends('layouts.admin')

@section('titulo')
<span>Encabezados</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de encabezados</h4>
                    <a type="button" class="btn btn-primary" href="{{route('encabezados.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-encabezados" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Saludo</th>
                        <th>Lugar</th>
                        <th>Despecida</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($encabezados as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre_destinatario }}</td>
                            <td>{{ $item->saludo }}</td>
                            <td>{{ $item->lugar }}</td>
                            <td>{{ $item->despedida }}</td>
                            <td colspan="2">
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
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