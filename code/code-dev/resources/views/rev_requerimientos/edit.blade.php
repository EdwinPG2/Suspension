@extends('layouts.admin')

@section('titulo')
<span>Revisión del oficio #{{$oficios->id_oficio}}</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="">
                    <h4>Verificar PDF del oficio</h4> 
                    <a href="{{ route('oficios.edit', $oficios->id_oficio) }}" class="btn btn-primary"><i class="fas fa-check-circle"></i> PDF</a>
                </div>
            </div>
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de Suspensiones</h4>
                </div>
            </div>
            
            @csrf   
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>No. afiliado</th>
                        <th>Nombres</th>
                        <th>Estado Suspensión</th>
                        <th>Inicio Suspensión</th>
                        <th>Registro de Suspensión</th>
                        <th>Fin Suspensión</th>
                        <th>Clinica</th>
                        <th>Doctor</th>
                        <th>Generar pago:</th>
                    </thead>
                    <tbody>
                        @foreach($ofisusp as $item)
                        @if($item->id_oficio == $oficios->id_oficio)
                        @if($item->desuspension->estado!='Rechazado')
                            <tr class="table-active">
                                <th scope="row">{{ $item->desuspension->no_afiliado}}</th>
                                <th>{{ $item->desuspension->afiliado->nombre}} {{ $item->desuspension->afiliado->apellidos}}</th>
                                <td>{{ $item->desuspension->estado }}</td>
                                <td>@if(date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) != '31-12-1969') {{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension))}} @endif</td>
                                <td>{{ $item->desuspension->fecha_registro }}</td>  
                                <td>@if(date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension)) != '31-12-1969'){{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension))}}@endif</td> 
                                <td>{{ $item->desuspension->clinica_servicio->nombre}}</td>                            
                                <td>{{ $item->desuspension->medico->nombres}}</td>
                                

                                <td align="center">
                                    
                                    @if($item->desuspension->estado == 'Aceptado')
                                    <a href="{{ route ('req.show', $item->desuspension->id_suspension) }}"
                                        class="btn btn-success"><i class="fas fa-check-circle"></i> Aceptada</a>
                                        <br> <br>
                                    <a href="{{ route ('req.edit', $item->desuspension->id_suspension) }}"
                                            class="btn btn-danger"><i class="fas fa-times-circle"></i> Rechazada</a>
                                    @endif

                                    @if($item->desuspension->estado == 'Validado')
                                    
                                    <a href="{{ route ('revsusp.show', $item->desuspension->id_suspension) }}"
                                        class="btn btn-success"><i class="fas fa-check-circle"></i> PAGO</a>
                                        <br> <br>
                                    <a href="{{ route ('gen.edit', $item->desuspension->id_suspension) }}"
                                            class="btn btn-danger"><i class="fas fa-times-circle"></i> PAGO</a>
                                    @endif

                                    @if($item->desuspension->estado == 'Denegado')
                                    Rechazo de papelería
                                        
                                    @endif

                                    @if($item->desuspension->pago != null)
                                        {{$item->desuspension->pago}}
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
<div class="row justify-content-between">
    <div align="left">
    <h4>Cambiar estado del oficio:</h4>
        <a href="{{route('oficio.congelado',$oficios->id_oficio)}}" class="btn btn-info">Congelado</a>
        <a href="{{route('oficio.espera',$oficios->id_oficio)}}" class="btn btn-info">En espera</a>
        <a href="{{route('oficio.archivado',$oficios->id_oficio)}}" class="btn btn-info">Archivado</a>
    </div>
</div>

@endsection