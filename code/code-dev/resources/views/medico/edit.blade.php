@extends('layouts.admin')

@section('titulo')
<span>Editar Medico</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de medico</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('medico.update', $medicos->colegiado) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="colegiado">Colegiado</label>
                                <input type="text" name="colegiado" value="{{ $medicos->colegiado}}" id="colegiado" class="form-control" placeholder="Numero de colegiado">   
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombre</label>
                                <input type="text" name="nombres" value="{{ $medicos->nombres}}" id="nombres" class="form-control" placeholder="Ingrese nombre">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="especialidad">Especialidad</label>
                                <input type="text" name="especialidad" value="{{ $medicos->especialidad}}" id="especialidad" class="form-control" placeholder="Ingrese especialidad">   
                            </div>
                        </div>
                    </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="telefono">teléfono</label>
                                <input type="text" name="telefono" value="{{ $medicos->telefono}}" id="telefono" class="form-control" placeholder="Ingrese número de teléfono">   
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="id_especialidad">Eliga area de especialidad</label>
                                <select name="id_especialidad" id="id_especialidad" class="form-control select2">
                                    @foreach($especialidades as  $item)
                                    <option value="{{ $item->id_especialidad }}">{{ $item->nombre_especialidad }}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>

                    

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('medico')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
