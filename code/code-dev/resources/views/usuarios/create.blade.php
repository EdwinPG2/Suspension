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
                    <div class="form-group">
                        <label for="ibm">IBM</label>
                        {!! Form::text('ibm', null, array('placeholder' => 'IBM','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        {!! Form::text('apellido', null, array('placeholder' => 'Apellido','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                        <label for="paswword">Password</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                    
                    <div class="form-group">
                        <label for="role">Roles</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
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