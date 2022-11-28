@extends('layouts.admin')

@section('titulo')
<span>Nuevos Riesgo</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar Riesgos</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('riesgos.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Riesgo</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese Riesgo">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese una Descripción">   
                            </div>
                        </div>
                        
                    </div>
                    
                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('riesgos') }}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
