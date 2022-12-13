@extends('layouts.admin')

@section('titulo')
<span>Suspensiones en el área de registros médicos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Suspensiones en revisión:</h4>
                        </div>
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Afiliado</th>
                            <th>Nombres</th>
                            <th>Fecha de registro</th>
                            <th>Estado</th>
                            
                        </thead>
                        <tbody>
                            
                            @foreach($suspenciones as $item2)
                            @if($item2->users_id_registrador == Auth::user()->id || Auth::user()->id == 1)
                            @if($item2->estado == 'Aceptado'||$item2->estado == 'Rechazado'||$item2->estado == 'En revisión')
                            <tr class="text-center">
                                <td id="nombre">{{ $item2->no_afiliado}}</td>
                                <td id="descripcion">{{ $item2->afiliado->nombre }} {{$item2->afiliado->apellidos}}</td>
                                <td id="fecha_registro">{{$item2->fecha_registro}}</td>
                                <td id="fecha_registro">{{$item2->estado}}</td>
                            </tr>
                            @endif
                            @endif
                            @endforeach   
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

