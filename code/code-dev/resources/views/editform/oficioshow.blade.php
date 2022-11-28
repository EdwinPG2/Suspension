@extends('layouts.admin')

@section('titulo')
<span>Seleccione Formularios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Formularios a agregar </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('editarform.store') }}" method="post">
                @csrf 
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <input type="hidden" name="id_suspension" id="id_suspension" class="form-control" placeholder="" value="{{$suspencion->id_suspension}}" readonly>   
                    </div>
                </div>
                <div class="row">
                    
                    
                    <div class="card-body">
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Agregar</th>
                            <th>Formulario</th>
                            <th>Descripcion</th>
                            
                        </thead>
                        <tbody>
                            @foreach ($formularios as $item)
                            <tr class="text-center">
                                <td>
                                    <input type="checkbox" name="id_formulario[]" id="{{$item->id_formulario}}" value="{{$item->id_formulario}}">
                                </td>
                                <td id="nombre">{{ $item->nombre}}</td>
                                <td id="descripcion">{{ $item->descripcion }}</td>
                            </tr>
                            @endforeach
                                
                            
                                
                            
                            
                        </tbody>
                    </table>
                    </div>
                    <!--@ livewire('suspencion') -->

                </div>

                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">AGREGAR</button>
                        <a type="button" class="btn btn-danger" href="javascript:history.back()">REGRESAR</a> <!-- route ('agregarformularios.show', $suspencion->id_suspension)}}-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


