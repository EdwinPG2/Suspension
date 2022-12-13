@extends('layouts.admin')

@section('titulo')
<span>Editar</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de Requerimiento </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('requerimientos.update', $requerimientos-> id_requerimiento) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="no_requerimiento">Numero de requerimiento</label>
                                <input type="text" name="no_requerimiento" value="{{ $requerimientos-> no_requerimiento}}" id="no_requerimiento" class="form-control" placeholder="Ingrese numero de requerimiento">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_requerimiento">Fecha de requerimiento</label>
                                <input type="date" name="fecha_requerimiento" value="{{ $requerimientos-> fecha_requerimiento}}" id="fecha_requerimiento" class="form-control" placeholder="Ingrese fecha de requerimiento">   
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" value="{{ $requerimientos-> estado}}" id="estado" class="form-control" placeholder="Ingrese estado" readonly>   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="observaciones">Observación</label>
                                <input type="text" name="observaciones" value="{{ $requerimientos->observaciones}}" id="nombre" class="form-control" placeholder="Ingrese observación">   
                            </div>
                        </div>
                        
                       
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('requerimientos')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection