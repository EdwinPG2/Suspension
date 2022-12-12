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
                        
                        <a type="button" class="btn btn-primary" href="{{ route('user.create') }}"><i class="fas fa-plus"></i>Nuevo</a>
                        
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
                        @foreach($users as $user)
                        <tr class="text-center">
                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->id }}</a></td>
                        <td>{{ $user->ibm }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach

                            @endif
                        </td>                            
                            <td colspan="2">
                                    
                                    <a href="{{ route('user.edit', $user->id)}}"
                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    
                                    <form action="{{ route('user.destroy',$user->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                    

                                    @can('user-reset')
                                    <form action="{{route('reset_password',$user->id)}}" method="post" class="d-inline">
                                    @csrf
                                        <button class="btn btn-success" type="submit"><i class="fas fa-sync-alt"></i></butt>
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