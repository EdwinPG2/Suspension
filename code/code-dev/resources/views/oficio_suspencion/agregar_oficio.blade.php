@extends('layouts.admin')

@section('titulo')
<span>Nuevo Formulario</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Asignación de suspenciones a oficios</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('ofisusp.store') }}" method="post">
                @csrf   
                <div class="card-body">
                    <table id="dt-suspencions" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Agregar</th>
                            <th>Afiliado</th>
                            <th>Fecha inicio de suspension</th>
                            <th>Fecha fin de suspension</th>
                            
                        </thead>
                        <tbody>
                            @foreach($suspensiones as $item)
                            <tr class="text-center">
                                <td>
                                    <input type="checkbox" name="id_suspension[]" id="{{$item->id_suspension}}" value="{{$item->id_suspension}}">
                                </td>
                                <td id="no_afiliado" name="no_afiliado">{{$item->afiliado->nombre}} {{$item->afiliado->apellidos}}</td>
                                <td id="fecha_inicio_suspension" name="fecha_inicio_suspension">{{ date('d-m-Y', strtotime($item->fecha_inicio_suspension)) }}</td>
                                <td id="fecha_fin_suspension" name="fecha_fin_suspension">{{ date('d-m-Y', strtotime($item->fecha_fin_suspension))}}</td>
                            </tr>
                            @endforeach     
                                   
                        </tbody>
                    </table>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_clinica_servicio">Oficios</label>
                            <select class="form-control" name="id_oficio" id="id_oficio">
                                @foreach ($oficios as $item)
                                <option value="{{$item->id_oficio}}">{{$item->destinatario}}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('formularios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection