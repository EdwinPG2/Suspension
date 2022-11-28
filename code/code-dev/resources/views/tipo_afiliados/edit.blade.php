@extends('layouts.admin')

@section('titulo')
<span>Editar tipo de afiliado</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tipo_afiliados.update', $tipo_afiliados->Id_tipo_afiliado) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" value="{{ $tipo_afiliados->nombre}}" id="nombre" class="form-control" placeholder="Ingrese nombre">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" name="descripcion" value="{{ $tipo_afiliados->descripcion}}" id="descripcion" class="form-control" placeholder="Ingrese descripción">   
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('tipo_afiliados')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
