@extends('layouts.admin')

@section('titulo')
<span>Editar Usuario</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de usuario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" value="{{ $usuario->name}}" id="name" class="form-control" placeholder="Actualizar name de usuario">   
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                {!! Form::text('email', $usuario->email, array('placeholder' => 'Correo electrónico','class' => 'form-control')) !!}   
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group"
                                <label for="roles">Roles</label>
                                {!! Form::select('role_id[]', $roles,$usuario->role_id, array('class' => 'form-control','multiple')) !!}   
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="permissions">Permisos</label>
                                <br/>
                                <ul style="columns: 3 auto;">
                                    @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}
                                        </label>
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