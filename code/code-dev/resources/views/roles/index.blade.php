@extends('layouts.admin')

@section('titulo')
<span>Roles</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de Roles</h4>
                    @can('role-create')
                        <a type="button" class="btn btn-primary" href="{{route('roles.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-roles" class="table table-striped table-bordered dts">
                    <thead>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th width="280px">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($roles as $item)
                        <tr class="text-center">
                            <td>{{ ++$i }}</td>
                            <td>{{ $item->name }}</td>
                            <td colspan="2">
                                    <a href="{{ route ('roles.edit', $item->id) }}"
                                    class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                
                                    <form action="{{ route('roles.destroy',$item->id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                               
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