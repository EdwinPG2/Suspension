@extends('layouts.admin')

@section('titulo')
<span>Editar Rol</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Editar datos de rol</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', $role->name, array('placeholder' => 'Name','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                        <label for="permissions">Permisos</label>
                        <br/>
                        <ul style="column: 3 auto;">
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}
                                </label>
                                <br/>
                            @endforeach
                        </ul>   
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('roles')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection