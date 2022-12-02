@extends('layouts.admin')

@section('titulo')
<span>Nueva clinica/servicio</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos de clinica/servicio</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('clinicas_servicios.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre (*)</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre de clinica/servicio" required maxlength="50">   
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label for="descripcion">Correlativo (*)</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="-- --" required maxlength="20">   
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_especialidad">Especialidad (*)</label>
                            <select class="form-control select2" name="id_especialidad" id="id_especialidad" required>
                                <option value = "" disabled selected>--Seleccione especialidad --</option>
                                @foreach($especialidades as  $item)
                                <option value = "{{ $item->id_especialidad }}">{{ $item->nombre_especialidad }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_area">Área (*)</label>
                            <select name="id_area" id="id_area" class="form-control select2" required>
                                <option value = "" disabled selected>--Seleccione área --</option>
                                @foreach($areas as  $item)
                                <option value="{{$item->id_area }}">{{$item->nombre }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                


                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('clinicas_servicios') }}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    input:invalid { border-color: red; } input , input:valid { border-color: #ccc; }
</style>
@endsection