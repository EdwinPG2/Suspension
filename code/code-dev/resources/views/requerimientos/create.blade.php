@extends('layouts.admin')

@section('titulo')
<span>Nuevos Requerimientos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar Requerimiento</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('requerimientos.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="no_requerimiento">Numero de requerimiento</label>
                                <input type="text" name="no_requerimiento" id="no_requerimiento" class="form-control" placeholder="Ingrese numero de requerimiento">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="fecha_requerimiento">Fecha de Requerimiento</label>
                                <input type="date" name="fecha_requerimiento" id="fecha_requerimiento" class="form-control" placeholder="Ingrese fecha de requerimiento">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="fecha_envio">Fecha de envio</label>
                                <input type="date" name="fecha_envio" id="fecha_envio" class="form-control" placeholder="Ingrese fecha de envio">   
                            </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" placeholder=" ">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="Ingrese observación">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="fecha_recepcion_regmed">Fecha Recepcion</label>
                                <input type="date" name="fecha_recepcion_regmed" id="fecha_recepcion_regmed" class="form-control" placeholder="Ingrese fecha de recepción">   
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_oficio">Oficio</label>
                            <select class="form-control select2" name="id_oficio" id="id_oficio">
                                @foreach($oficio as  $item)
                                <option value = "{{ $item->id_oficio }}">{{ $item->id_oficio }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="no_afiliado">Afiliado</label>
                            <select class="form-control select2" name="no_afiliado" id="no_afiliado">
                                @foreach($afiliado as  $item)
                                <option value = "{{ $item->no_afiliado }}">{{ $item->no_afiliado }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_usuario">Usuario remitente</label>
                            <select name="id_usuario" id="id_usuario" class="form-control select2">
                                @foreach($usuario as  $item)
                                <option value="{{ $item->id_usuario }}">{{$item->nombre_usuario }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_usuario">Usuario responsable</label>
                            <select name="id_usuario" id="id_usuario" class="form-control select2">
                                @foreach($usuario as  $item)
                                <option value="{{ $item->id_usuario }}">{{$item->nombre_usuario }}</option>
                                @endforeach   
                            </select>   
                        </div>
                    </div>
                

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('requerimientos') }}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

