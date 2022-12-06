@extends('layouts.admin')

@section('titulo')
<span>Suspensiones del sistema</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
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
                            @if($item->users_id_creador == Auth::user()->id)
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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

