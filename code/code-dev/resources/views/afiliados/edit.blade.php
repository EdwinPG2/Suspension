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
                <form action="{{ route('afiliados.update', $afiliados->no_afiliado) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label for="no_afiliado">Cui</label>
                                <input type="text" name="no_afiliado" id="no_afiliado" class="form-control" placeholder="" 
                                value="{{isset($afiliados->no_afiliado)?$afiliados->no_afiliado:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <label for="cui">Cui</label>
                                <input type="text" name="cui" id="cui" class="form-control" placeholder="" 
                                value="{{isset($afiliados->cui)?$afiliados->cui:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="form-group">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder=""
                                value="{{isset($afiliados->nombre)?$afiliados->nombre:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <div class="form-group">
                                <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder=""
                                value="{{isset($afiliados->apellidos)?$afiliados->apellidos:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" id="telefono"class="form-control" placeholder=""
                                value="{{isset($afiliados->telefono)?$afiliados->telefono:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder=""
                                value="{{isset($afiliados->direccion)?$afiliados->direccion:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="genero">Genero</label>
                                <input type="text" name="genero" id="genero" class="form-control" placeholder="M - F"
                                value="{{isset($afiliados->genero)?$afiliados->genero:''}}">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder=""
                                value="{{isset($afiliados->fecha_nacimiento)?$afiliados->fecha_nacimiento->toDateString():''}}">   
                            </div>
                        </div>
                        
                    </div>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('afiliados')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
