@extends('layouts.admin')

@section('titulo')
<span>Editar Clinica/Servicio</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de clinicas servicios </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('clinicas_servicios.update', $clinicas_servicios-> id_clinica_servicio) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" value="{{ $clinicas_servicios-> nombre}}" id="nombre" class="form-control" placeholder="Ingrese nombre de clinica/servicio">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" value="{{ $clinicas_servicios-> descripcion}}" id="descripcion" class="form-control" placeholder="Ingrese descripción de clinica/servicio">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_especialidad">Especialidad</label>
                            <select class="form-control" name="id_especialidad" id="id_especialidad">
                                @foreach ($especialidades as $item)
                                    <option 
                                    @if($clinicas_servicios->id_especialidad== $item->id_especialidad)
                                        selected="selected"
                                        @endif
                                    value = "{{$item->id_especialidad }}">{{ $item->nombre_especialidad }}</option>
                                @endforeach
                            </select>   
                        </div>
                        <div class="form-group">
                            <label for="id_area">Area</label>
                            <select class="form-control" name="id_area" id="id_area">
                                @foreach ($areas as $item)
                                    <option 
                                    @if($clinicas_servicios->id_area == $item->id_area)
                                        selected="selected"
                                        @endif
                                    value = "{{$item->id_area }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('clinicas_servicios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection