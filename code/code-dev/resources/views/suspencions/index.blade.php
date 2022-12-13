@extends('layouts.admin')

@section('titulo')
<span>Suspenciones</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Listado de suspenciones</h4>
                    @can('suspension-create')
                    <a type="button" class="btn btn-primary" href="{{ route('suspencions.create')}}"><i class="fas fa-plus"></i>Nuevo</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table id="dt-suspencions" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Id</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de registro</th>
                        <th>Fecha de envio a prestaciones</th>
                        <th>Fecha de revision</th>
                        <th>Observacion</th>
                        <th>Estado</th>
                        <th>No de afiliado</th>
                        <th>Clinica/servicio</th>
                        <th>Usuario registrador</th>
                        <th>Usuario revisor</th>
                        
                        <th style="height: auto">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($suspencions as $item)
                        <tr class="text-center">
                            <td>{{ $item->id_suspension }}</td>
                            <td>{{ $item->fecha_inicio_suspesion }}</td>
                            <td>{{ $item->fecha_alta }}</td>
                            <td>{{ $item->fecha_registro }}</td>
                            <td>{{ $item->fecha_envio_prestacion }}</td>
                            <td>{{ $item->fecha_recibido_prestacione }}</td>
                            <td>{{ $item->fecha_revision }}</td>
                            <td>{{ $item->observacion }}</td>
                            <td>{{ $item->estado }}</td>
                            <td>{{ $item->afiliado->no_afiliado }}</td>
                            <td>{{ $item->clinica_servicio->nombre }}</td>
                            <td>{{ $item->usuario_registrador->nombres }}</td>
                            <td>{{isset($item->usuario_revisor->nombres)?$item->usuario_revisor->nombres:''}}</td>
                            <td>
                                @can('suspension-edit')
                                <a href="{{ route ('suspencions.edit', $item->no_afiliado) }}"
                                class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('suspencions.destroy',$item->no_afiliado)}} " method ="post" class="d-inline">
                                @endcan
                                @can('suspension-delete')
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                @endcan
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

@push('scripts')
    <script>
        function editEspecialidad(item){
            $("#editEspecialidadFrm").attr('action',`/suspencions/${item.id}`);

            $("#editEspecialidadFrm #Id_especialidad").val(item.id_suspension);
            $("#editEspecialidadFrm #Nombre_especialidad").val(item.observacion);
            $("#editEspecialidadFrm #Descripcion").val(item.estado);
            
        }
    </script>

    @if(!$errors->isEmpty())
        @if($errors->has('POST'))
            <script>
                $(function () {
                    $('#createMdl').modal('show');
                });
            </script>
        @else
            <script>
                $(function () {
                    $('#detalleMdl').modal('show');
                });
            </script>
        @endif
    @endif
@endpush 