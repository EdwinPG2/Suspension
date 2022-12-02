@extends('layouts.admin')

@section('titulo')
<span>Revision del oficio {{$oficios->correlativo}}</span>
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
            
            @csrf   
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Estado Suspension</th>
                        <th>Inicio Suspension</th>
                        <th>Registro de Suspension</th>
                        <th>Fin Suspension</th>
                        <th>Clinica</th>
                        <th>Doctor</th>
                        <th>Generar pago:</th>
                    </thead>
                    <tbody>
                        @foreach($ofisusp as $item)
                        @if($item->id_oficio == $oficios->id_oficio)
                        @if($item->desuspension->estado!='Rechazado')
                            <tr class="table-active">
                                <th scope="row">{{ $item->desuspension->id_suspension}}</th>
                                <td>{{ $item->desuspension->estado }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension))}}</td>
                                <td>{{ $item->desuspension->fecha_registro }}</td>  
                                <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension))}}</td> 
                                <td>{{ $item->desuspension->clinica_servicio->nombre}}</td>                            
                                <td>{{ $item->desuspension->medico->nombres}}</td>
                                

                                <td align="center">

                                    @if($item->desuspension->estado == 'Aceptado')
                                    <a href="{{ route ('req.show', $item->desuspension->id_suspension) }}"
                                        class="btn btn-success"><i class="fas fa-check-circle"></i> Aceptada</a>
                                        <br> <br>
                                    <a href="{{ route ('revsusp.edit', $item->desuspension->id_suspension) }}"
                                            class="btn btn-danger"><i class="fas fa-times-circle"></i> Rechazada</a>
                                    @endif

                                    @if($item->desuspension->estado == 'Validado')
                                    <a href="{{ route ('revsusp.show', $item->desuspension->id_suspension) }}"
                                        class="btn btn-success"><i class="fas fa-check-circle"></i> PAGO</a>
                                        <br> <br>
                                    <a href="{{ route ('revsusp.edit', $item->desuspension->id_suspension) }}"
                                            class="btn btn-danger"><i class="fas fa-times-circle"></i> PAGO</a>
                                    @endif
                                </td>
                                
                            </tr>
                        @endif
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-between">
                    
                    <a type="button" class="btn btn-info" href="{{ url('revreq')}}"><i class="fas fa-reply"></i> Regresar</a>
                </div>
        </div>
                
       
        </div>
    </div>
</div>
@endsection