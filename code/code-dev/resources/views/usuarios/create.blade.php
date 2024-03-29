@extends('layouts.admin')

@section('titulo')
<span>Nuevos Usuarios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos de Usuarios</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="ibm">IBM (*)</label>
                                <input type="text" name="ibm" id="ibm" class="form-control" placeholder="Ingrese # de IBM" required maxlength="9" pattern="*" title="Ingrese solamente numeros"> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre (*)</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Ingrese su nombre" required maxlength="45" pattern="*" title="Ingrese solamente letras">   
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido (*)</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido" required maxlength="letras" pattern="*" title="Ingrese solamente letras">
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Email (*)</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Ingrese su correo" required maxlength="letras" pattern="*" title="Ingrese solamente letras">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="password">Password (*)</label>
                                <input type="text" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required maxlength="letras" pattern="*" title="Ingrese solamente letras" value="Igssxela">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password (*)</label>
                                <input type="text" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirme su contraseña" required maxlength="letras" pattern="*" title="Ingrese solamente letras" value="Igssxela">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="role">Roles (*)</label>
                                {!! Form::select('role_id[]', $roles,[], array('class' => 'form-control','')) !!}
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="permission">Permisos</label>
                                <br/>
                                <ul style="columns: 3 auto;">
                                    @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    <br/>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('usuarios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection