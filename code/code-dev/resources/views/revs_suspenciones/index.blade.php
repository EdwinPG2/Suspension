@extends('layouts.admin')

@section('titulo')
<span>Revision de Suspensiones</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de formularios</h4>
                    @can('rev_Suspencion-create')
                    <a type="button" class="btn btn-primary" href="{{route('formularios.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>observacion</th>
                        <th>Estado</th>
                        <th>Oficio</th>
                        <th>OPCIONES</th>
                    </thead>
                    <tbody>
                        @foreach($rev_sus as $item)
                        <tr class="text-center">
                            <td>{{ $item->id_rev_susp }}</td>
                            <td>{{ $item->observacion}}</td>
                            <td>{{ $item->suspension->estado}}</td>
                            <td>{{ $item->id_revision_oficio}}</td>
                            <td>
                            <table>
                                <td>
                                    <a href="{{ route ('revsusp.edit', $item->id_rev_susp) }}"
                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('revsusp.destroy', $item->id_rev_susp)}} " method ="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </td>
                                </table>
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