@extends('layouts.admin')

@section('titulo')
<span>Cargos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de cargos</h4>
                    @can('dependencia-create')
                        <a type="button" class="btn btn-primary" href="{{route('cargo.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-dependencias" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($cargos as $item)
                        <tr class="text-center">
                           
                            <td>{{ $item->nombre }}</td>
                            <td colspan="2 flex justify-center">
                                
                                    <form action="{{ route('cargo.destroy',$item->id_cargo)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit" class="d-inline"><i class="fas fa-trash"></i></button>
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