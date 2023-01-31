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
                    <h4>Asignación de suspensiones a oficios</h4>
                    
                    <ul>
                        <a type="button" class="btn btn-primary" href="{{ route('suspen_oficio.index')}}"><i class="fas fa-plus"></i>Asignar</a>
                
                    </ul>
                </div>
                Seleccione las suspensiones para agregarlas a un oficio nuevo
            </div>
            <div class="card-body">
                <table id="dt-suspencions" class="table table-striped table-bordered dts">
                    <thead>
                        <th>Agregar</th>
                        <th>Suspensión</th>
                        <th>Oficio</th>
                        <th>Estado</th>
                        
                    </thead>
                    <tbody>
                        @foreach($ofi_sus as $item)
                        
                        <form action="" method="POST">
                        <tr class="text-center">
                            <td>
                                    <input type="checkbox" name="{{$item->id_oficio_suspencion}}" id="{{$item->id_oficio_suspencion}}">  
                            </td>
                            <td>{{ $item->desuspension->estado}}</td>
                            <td>{{ $item->doficio->destinatario}}</td>
                            <td>{{ $item->estado }}</td>
                        </tr>
                        @endforeach   
                    </form>             
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