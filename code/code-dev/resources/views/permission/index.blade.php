@extends('layouts.admin')

@section('titulo')
<span>Permisos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de permisos</h4>
                    
                        <a type="button" class="btn btn-primary" href="{{route('permission.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    
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
                        @foreach($rows as $row)
                        <tr class="text-center">
                            <td><a href="{{ route('permission.show', $row->id) }}">{{ $row->id }}</a></td>
                            <td>{{ $row->name }}</td>
        
                        </tr>
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection