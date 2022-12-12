@extends('layouts.admin')

@section('titulo')
<span>Nuevo Rol</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos de rol</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        {!! Form::text('name', $row->name , array('placeholder' => 'Ingrese el nombre del rol','class' => 'form-control')) !!}   
                    </div>
                    <div class="form-group">
                    <label for="permission">Permisos</label>
                        @foreach ($permissions as $permission)
                            <div clas="col-12">
                                {!! Form::checkbox(
                                    "permission[{$permission->id}]",
                                    $permission->id,
                                    $row->hasPermissionTo($permission->id),
                                    ['label' => $permission->name
                                ]) !!}
                            </div>
                        @endforeach   
                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('role')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection