@extends('layouts.admin')

@section('titulo')
<span>Riesgos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de riesgos</h4>
                    @can('riesgo-create')
                    <a type="button" class="btn btn-primary" href="{{ route('riesgos.create') }}"><i class="fas fa-plus"> </i> Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-riesgos" class="table table-striped table-bordered dts">
                    <thead>
                        <th> Nombre de riesgo </th>
                        <th> Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($riesgos as $item)
                        <tr class="text-center">
                            <td>{{ $item->nombre }}</td>
                            <td colspan="2">
                                @can('riesgo-edit')
                                    <a href="{{ route ('riesgos.edit', $item-> id) }}"
                                    class="btn btn-warning" ><i class="fas fa-edit"></i></a>
                                @endcan

                                @can('riesgo-delete')
                                    <form action="{{ route('riesgos.destroy',$item-> id)}}" method="post" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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