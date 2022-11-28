@extends('layouts.admin')

@section('titulo')
<span>Delegación</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Bandeja de oficios</h4>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Fecha Revisado</th>
                        <th>Destinatario</th>
                        <th>Estado del Oficio</th>
                        <th>Correlativo</th>
                        <th>OPCIONES</th>
                    </thead>
                    <tbody>
                        @foreach($oficios as $item)
                        @if($item->estado=='Congelado')
                        <tr class="text-center">
                            <td>{{ $item->id_oficio }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                            <td>{{ $item->destinatario}}</td>
                            <td>{{ $item->estado}}</td>
                            <td>{{ $item->correlativo}}</td>
                        
                            
                            <td>
                                <a href="{{ route ('revreq.edit', $item->id_oficio) }}"
                                        class="btn btn-info"><i class="fas fa-check-circle"></i> Detalles</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection