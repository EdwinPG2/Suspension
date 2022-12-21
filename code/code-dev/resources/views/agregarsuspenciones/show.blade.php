@extends('layouts.admin')

@section('titulo')
<span>Seleccione suspensiones</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Suspensiones disponibles:</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('agregarsuspenciones.store') }}" method="post">
                @csrf 
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <input type="hidden" name="id_oficio" id="id_oficio" class="form-control" placeholder="" value="{{$oficio->id_oficio}}" readonly>   
                    </div>
                </div>
                <div class="row">
                    
                    
                    
                    <div class="card-body">
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Agregar</th>
                            <th>Afiliado</th>
                            <th>Nombres</th>
                            <th>Fecha de registro</th>
                            <th>Estado</th>
                            
                        </thead>
                        <tbody>
                            @foreach($suspenciones as $item2)
                            @foreach($suspenciones_existentes as $item)
                            @if ($item->id_suspension != $item2->id_suspension)
                                
                            @endif
                            <tr class="text-center">
                                <td>
                                    <input type="checkbox" name="id_suspension[]" id="{{$item2->id_suspension}}" value="{{$item2->id_suspension}}">
                                </td>
                                <td id="nombre">{{ $item2->no_afiliado}}</td>
                                <td id="descripcion">{{ $item2->afiliado->nombre }} {{$item2->afiliado->apellidos}}</td>
                                <td id="fecha_registro">{{$item2->fecha_registro}}</td>
                                <td id="fecha_registro">{{$item2->estado}}</td>
                            </tr>
                            @endif
                            @endforeach
                            @endforeach   
                        </tbody>
                    </table>
                </div>
                    <!--@ livewire('suspencion') -->

                </div>

                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">AGREGAR</button>
                        <a type="button" class="btn btn-danger" href="{{ route ('oficios.index')}}">NO AGREGAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

