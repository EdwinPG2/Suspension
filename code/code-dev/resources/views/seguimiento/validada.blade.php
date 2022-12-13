@extends('layouts.admin')

@section('titulo')
<span>Suspensiones existentes en el área de delegación</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                   
<!----------------------------------Tabla de suspensiones en delegacion-------------------------------------->
                <div class="card-body">
                    <div class="card-header">
                        <h4>Suspensiones en seguimiento:</h4>
                    </div>
                <table id="dt-suspencions" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Afiliado</th>
                        <th>Nombres</th>
                        <th>Fecha de registro</th>
                        <th>Estado</th>
                        
                    </thead>
                    <tbody>
                        
                        @foreach($suspenciones as $item3)
                        @if($item3->users_id_creador == Auth::user()->id)
                        @if($item3->estado == 'Validado'||$item3->estado == 'Denegado')
                        <tr class="text-center">
                            <td id="nombre">{{ $item3->no_afiliado}}</td>
                            <td id="descripcion">{{ $item3->afiliado->nombre }} {{$item3->afiliado->apellidos}}</td>
                            <td id="fecha_registro">{{$item3->fecha_registro}}</td>
                            <td id="fecha_registro">{{$item3->estado}}</td>
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

