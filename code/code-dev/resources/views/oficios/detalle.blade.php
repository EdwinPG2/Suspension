@extends('layouts.admin')

@section('titulo')
<span>Detalle de Oficios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Oficio para {{$oficio->destinatario}}</h4>
                <h4>Correlativo no: {{$oficio->correlativo}}</h4>
            </div>
            <div class="card-body">
                    
                <table id="t-oficios" class="table table-hover" align="center">
                    <thead>
                        <th scope="col">Afiliado</th>
                        <th scope="col">Nombres y apellidos</th>
                        <th scope="col">Fecha accidente</th>
                        <th scope="col">Fecha inicio caso</th>
                        <th scope="col">Inicio y fin de la suspension</th>
                        <th scope="col">Documentos</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        
                    </thead>
                    
                    <tbody>
                        @foreach ($ofi_susp as $item)
                        @if($item->desuspension->estado == 'Registrado')
                        <tr class="table-active">
                            <th scope="row">{{ $item->desuspension->no_afiliado}}</th>
                            <th scope="row">{{$item->desuspension->afiliado->nombre}} {{$item->desuspension->afiliado->apellidos}}</th>
                            <td>{{ date('d-M-y', strtotime($item->desuspension->fecha_inicio_caso)) }}</td>
                            <td>{{ date('d-M-y', strtotime($item->desuspension->fecha_accidente)) }}</td>
                            <td>{{ date('d-M-y', strtotime($item->desuspension->fecha_inicio_suspension))}} --- {{date('d-M-y', strtotime($item->desuspension->fecha_fin_suspension)) }}</td>
                            <th scope="row">
                                @foreach ($formularios as $item2 )
                                    @if ($item2->id_suspension == $item->id_suspension)
                                        {{ $item2->Formularios}}
                                    @endif
                                @endforeach
                            </th>
                            <td id="editar">
                                <a href="{{ route ('agregarformularios.show', $item->id_suspension) }}"
                                    class="btn btn-warning">Formularios</a>
                                <a href="{{ route ('createsuspencions.edit', $item->desuspension->id_suspension) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i> Datos</a>
                            </td>
                            <td id="eliminar">
                                <form action="{{ route('ofisusp.destroy',$item->id_oficio_suspencion)}} " method ="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            </td>
                            
                        </tr>
                        @endif
                        @endforeach
                                   
                    </tbody>
                </table>
                    <hr>
                    <div class="row justify-content-between">
                        <a type="button" class="btn btn-info" href="{{ route('editaroficios.show',$oficio->id_oficio)}}">ENVIAR A REVISIÓN</a>
                        <a type="button" class="btn btn-primary" href="{{ route('agregarsuspenciones.show',$oficio->id_oficio)}}">AÑADIR SUSPENCIONES</a>
                        <a type="button" class="btn btn-danger" href="javascript:history.back()"><-REGRESAR</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
