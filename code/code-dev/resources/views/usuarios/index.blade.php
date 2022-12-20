@extends('layouts.admin')

@section('titulo')
<span>Usuarios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de Usuarios</h4>
                        @can('user-create')
                        <a type="button" class="btn btn-primary" href="{{ route('usuarios.create') }}"><i class="fas fa-plus"></i>Nuevo</a>
                        @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-usuarios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>No</th>
                        <th>IBM</th>
                        <th>Name</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th width="260px">Action</th>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $item)
                        <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $item->ibm }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->apellido }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <label class="badge badge-success">{{ $item->role->name }}</label>
                        </td>
                                                    
                            <td colspan="2">
                                    @can('user-edit')
                                    <a href="{{ route('usuarios.edit', $item->id)}}"
                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    @endcan
                                    
                                    @can('user-delete')
                                    <form action="{{ route('usuarios.destroy',$item->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endcan

                                    @can('user-reset')
                                    <form action="{{route('reset_password',$item->id)}}" method="post" class="d-inline">
                                    @csrf
                                        <button class="btn btn-success" type="submit"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                    @endcan
                            </td>
                        </tr>
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection