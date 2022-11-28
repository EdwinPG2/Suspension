@extends('layouts.admin')

@section('titulo')
<span>Revision del correlativo {{$oficios->correlativo}}</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de Suspensiones</h4>
                </div>
            </div>
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Estado Suspension</th>
                        <th>Inicio Suspension</th>
                        <th>Fecha de Registro</th>
                        <th>OPCIONES</th>
                    </thead>
                    <tbody>
                        @foreach($ofisusp as $item)
                        @if($item->id_oficio == $oficios->id_oficio)
                            <tr class="table-active">
                                <th scope="row">{{ $item->desuspension->id_suspension}}</th>
                                <td>{{ $item->desuspension->estado }}</td>
                                <td>{{ $item->desuspension->fecha_inicio_suspension }}</td>
                                <td>{{ $item->desuspension->fecha_registro }}</td>                                
                                <td>
                                    <table>
                                        <td>
                                            <a href="{{ route ('createsuspencions.edit', $item->desuspension->id_suspension) }}"
                                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('createsuspencions.destroy', $item->desuspension->id_suspension)}} " method ="post">
                                                @csrf
                                                    {{method_field('DELETE')}}
                                                    
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </td>
                                        
                                    </table>
                                </form>
                                </td>
                            </tr>
                        @endif
                        @endforeach                
                    </tbody>
                </table>
                <hr>
                <div class="row justify-content-between">
                    <a type="button" class="btn btn-danger" href="{{ url('revofi')}}"><-Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection