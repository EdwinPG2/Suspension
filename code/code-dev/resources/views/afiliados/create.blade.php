@extends('layouts.admin')

@section('titulo')
<span>Nuevo Afiliado</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos del afiliado</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('afiliados.store') }}" method="post" autocomplete="off">
                @csrf   
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="no_afiliado">Numero de afiliación (*)</label>
                            <input type="text" name="no_afiliado" id="no_afiliado" class="form-control" placeholder="Ejemplo: 54321" required maxlength="13" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="cui">Cui</label>
                            <input type="text" name="cui" id="cui" class="form-control" placeholder="Ejemplo: 12345" minlength="13" maxlength="13" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="nombre">Nombres (*)</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ejemplo: Luis" required maxlength="100">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellidos (*)</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ejemplo: Rodriguez" required maxlength="100">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="telefono">Teléfono (*)</label>
                            <input type="text" name="telefono" id="telefono"class="form-control" placeholder="8765" required minlength="8" maxlength="15" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" maxlength="50" placeholder="-- --">   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value="" disabled selected>-- --</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>  
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="" >   
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