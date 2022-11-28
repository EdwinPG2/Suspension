@extends('layouts.admin')

@section('titulo')
<span>Formularios de afiliado no: {{$suspencion->afiliado->no_afiliado}}</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Listado de formularios agregados a suspencion </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    
                    
                    
                    <div class="card-body">
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            
                            <th>Formulario</th>
                            <!--<th>Descripcion</th>-->
                            <th>Eliminar</th>
                            
                        </thead>
                        <tbody>
                            
                            @foreach($formularios as $item2)
                            <tr class="text-center">
                                <td id="nombre">{{ $item2->formulario->nombre}}</td>
                                <!--<td id="descripcion">{ $item2->formulario->descripcion }}</td>-->
                                <td id="eliminar">
                                    <form action="{{ route('agregarformularios.destroy',$item2->id_formulario_suspencion)}} " method ="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                </td>
                                
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
                    <!--@ livewire('suspencion') -->

                </div>

                    <div class="row justify-content-between">
                        
                        <a type="button" class="btn btn-primary" href="{{ route('formularios.show',$suspencion->id_suspension)}}">AÑADIR FORMULARIOS</a>
                        <a type="button" class="btn btn-danger" href="javascript:history.back()">REGRESAR</a>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection