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
                    <div align="left">
                    <h4>Seleccione que tipo de oficios desea ver:</h4>
                        <a href="{{route('revreq.index')}}" class="btn btn-info">Pendientes de revisar</a>
                        <a href="{{route('oficio.verespera')}}" class="btn btn-info">En espera</a>
                        <a href="{{route('oficio.verarchivado')}}" class="btn btn-info">Archivados</a>
                    </div>
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
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($oficios as $item)
                        
                        <tr class="text-center">
                            <td>{{ $item->id_oficio }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                            <td>{{ $item->destinatario}}</td>
                            <td>{{ $item->estado}}</td>
                            <td>
                                @if ($item->correlativo <= 9)
                                                    000{{ $item->correlativo }}
                                                @elseif($item->correlativo <= 99)
                                                    00{{ $item->correlativo }}
                                                @elseif($item->correlativo <= 990)
                                                    0{{ $item->correlativo }}
                                @endif
                                                /
                                                {{ $item->fecha->translatedFormat('Y') }}
                                                {{ $item->dclinica_servicio->descripcion }}
                            </td>
                            <td>
                                <a href="{{ route ('revreq.edit', $item->id_oficio) }}"
                                        class="btn btn-info"><i class="fas fa-check-circle"></i> Detalles</a>
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