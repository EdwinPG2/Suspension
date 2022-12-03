@extends('layouts.admin')

@section('titulo')
<span>Nuevo médico</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos del médico</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('medico.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="colegiado">Colegiado (*)</label>
                                <input type="text" name="colegiado" id="colegiado" class="form-control" placeholder="Ingrese # de colegiado" required maxlength="10" pattern="[0-9]*" title="Ingrese solamente numeros">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="nombres">Nombres y Apellidos (*)</label>
                                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ejm: Edwin Jose Morales Ramirez" required maxlength="45">   
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="especialidad">Especialidad (*)</label>
                                <input type="text" name="especialidad" id="especialidad" class="form-control" placeholder="Ingrese especialidad" required maxlength="45">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese teléfono" maxlength="11">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="id_especialidad">Eliga especialidad de trabajo (*)</label>
                                <select name="id_especialidad" id="id_especialidad" class="form-control select2" required>
                                    <option value="" disabled selected>-- Seleccione una opcion --</option>
                                    @foreach($especialidades as  $item)
                                    <option value="{{ $item->id_especialidad }}">{{ $item->nombre_especialidad }}</option>
                                    @endforeach
                                </select>   
                            </div>
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