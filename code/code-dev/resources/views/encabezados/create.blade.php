@extends('layouts.admin')

@section('titulo')
<span>Nuevo encabezado</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos del encabezado</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('encabezados.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre_destinatario">Nombre</label>
                                <input type="text" name="nombre_destinatario" id="nombre_destinatario" class="form-control" placeholder="Ingrese nombre del oficio">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="saludo">Saludo</label>
                                <input type="text" name="saludo" id="saludo" class="form-control" placeholder="Ingrese saludo del encabezado">   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Ingrese lugar">   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="despedida">Despedida</label>
                                <input type="text" name="despedida" id="despedida" class="form-control" rows="3" cols="50" placeholder="Ingrese una despedida">   
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('oficios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection