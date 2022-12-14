@extends('layouts.admin')

@section('titulo')
<span>Vista general de suspensiones en el sistema</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <!---------------------------------Tabla de suspensiones en secretaria------------------------------>
            <div class="card-body">
                <div class="row">
                    
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Suspensiones registradas:</h4>
                        </div>
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Afiliado</th>
                            <th>Nombres</th>
                            <th>Fecha de registro</th>
                            <th>Estado</th>
                            
                        </thead>
                        <tbody>
                            
                            @foreach($suspenciones as $item)
                            @if($item->estado == 'Registrado')
                            @if($item->users_id_registrador == Auth::user()->id || Auth::user()->id == 1)
                            <tr class="text-center">
                                <td id="nombre">{{ $item->no_afiliado}}</td>
                                <td id="descripcion">{{ $item->afiliado->nombre }} {{$item->afiliado->apellidos}}</td>
                                <td id="fecha_registro">{{$item->fecha_registro}}</td>
                                <td id="fecha_registro">{{$item->estado}}</td>
                            </tr>
                            @endif
                            @endif
                            @endforeach   
                        </tbody>
                    </table>
                </div>
                <!-------------------------Tabla de suspensiones en revision---------------------------------->
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Suspensiones en revisi??n:</h4>
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
                            @if($item2->estado == 'Aceptado'||$item2->estado == 'Rechazado'||$item2->estado == 'En revisi??n')
                            @if($item->users_id_registrador == Auth::user()->id || Auth::user()->id == 1)
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
<!----------------------------------Tabla de suspensiones en delegacion-------------------------------------->
                <div class="card-body">
                    <div class="card-header">
                        <h4>Suspensiones en delegaci??n:</h4>
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
                        @if($item3->estado == 'Validado'||$item3->estado == 'Denegado')
                        @if($item->users_id_registrador == Auth::user()->id || Auth::user()->id == 1)
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

