@extends('layouts.admin')

@section('titulo')
<span>Editar Especialidad</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de especialidad</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('especialidades.update', $especialidades->id_especialidad) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre_especialidad">Nombre (*)</label>
                                <input type="text" name="nombre_especialidad" value="{{ $especialidades->nombre_especialidad}}" id="nombre_especialidad" class="form-control" placeholder="Ingrese nombre de especialidad" required max="100">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" value="{{ $especialidades->descripcion}}" id="descripcion" class="form-control" placeholder="Ingrese descripción de especialidad"  max="45">   
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('especialidades')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
