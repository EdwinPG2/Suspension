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
                <form action="{{ route('afiliados.store') }}" method="post">
                @csrf   
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="no_afiliado">Numero de afiliacion (*)</label>
                            <input type="text" name="no_afiliado" id="no_afiliado" class="form-control" placeholder="Ejemplo: 54321" required maxlength="15" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="cui">Cui (*)</label>
                            <input type="text" name="cui" id="cui" class="form-control" placeholder="Ejemplo: 12345" required minlength="13" maxlength="13" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="nombre">Nombres (*)</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ejemplo: Luis" required max="100">   
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="apellidos">Apellidos (*)</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ejemplo: Rodriguez" required max="100">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="telefono">Telefono (*)</label>
                            <input type="text" name="telefono" id="telefono"class="form-control" placeholder="8765" required minlength="8" maxlength="15" pattern="[0-9]*" title="Ingrese solamente numeros">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" maxlength="50" placeholder="Quetzaltenango">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value="" disabled selected>-- --</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>  
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento (*)</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="" required>   
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

<style>
    input:invalid { border-color: red; } input , input:valid { border-color: #ccc; }
</style>
@endsection