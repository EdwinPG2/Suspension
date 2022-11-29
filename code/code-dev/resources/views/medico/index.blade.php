@extends('layouts.admin')

@section('titulo')
<span>MEDICOS</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de medicos</h4>
                        
                    <a type="button" class="btn btn-primary" href="{{route('medico.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                
                </div>
            </div>
            <div class="card-body">
                <table id="dt-oficios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Colegiado</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>No.Telefono</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($medicos as $item)
                        <tr class="text-center">
                            <td>{{ $item->colegiado }}</td>
                            <td>{{ $item->nombres }}</td>
                            <td>{{ $item->especialidad }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>
                                <a href="{{ route ('medico.edit', $item->colegiado) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('medico.destroy',$item->colegiado)}} " method ="post" class="d-inline">
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