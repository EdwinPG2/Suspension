@extends('layouts.admin')

@section('titulo')
<span>Revision de Suspension #{{$suspension->id_suspension}}</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de Suspensiones</h4>
                </div>
            </div>
            <div class="card-body">
                
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Inicio Suspension</th>
                        <th>Fecha de Registro</th>
                        <th>Fin Suspension</th>
                        <th>Clinica</th>
                        <th>Medico</th>
                    </thead>
                    <tbody>
                        <tr class="table-active">
                            <th scope="row">{{ $suspension->id_suspension}}</th>
                            <td>{{ $suspension->estado }}</td>
                            <td>{{  date('d-m-Y', strtotime($suspension->fecha_inicio_suspension)) }}</td>
                            <td>{{ $suspension->fecha_registro }}</td>  
                            <td>{{  date('d-m-Y', strtotime($suspension->fecha_fin_suspension))}}</td> 
                            <td>{{ $suspension->clinica_servicio->nombre}}</td>                            
                            <td>{{ $suspension->medico->nombres}}</td>
                        </tr>              
                    </tbody>
                </table>
<br>

        <form action="{{ route('susp.update', $suspension->id_suspension) }}" method="post">
            @method('PATCH')
            @csrf  
                <div class="col-lg-4 col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado de la suspensión</label>
                        <select name="estado" id="estado" class="form-control select2">
                            <option value="Aceptado">Aceptado</option>
                            <option value="Rechazado">Rechazado</option>
                        </select>   
                    </div>
                </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <input type="text" name="observacion" id="observacion" class="form-control" rows="3" placeholder="Comentario">   
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('revofi')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection