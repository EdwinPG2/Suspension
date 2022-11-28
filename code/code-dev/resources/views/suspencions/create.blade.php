@extends('layouts.admin')

@section('titulo')
<span>Nueva suspencion</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('suspencions.store') }}" method="post">
                @csrf   
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_inicio_suspension">Fecha de inicio de suspencion</label>
                            <input type="date" name="fecha_inicio_suspension" id="fecha_inicio_suspension" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_fin_suspension">Fecha de finanlizacion de suspencion</label>
                            <input type="date" name="fecha_fin_suspension" id="fecha_fin_suspension" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_alta">Fecha de alta</label>
                            <input type="date" name="fecha_alta" id="fecha_alta" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_registro">Fecha de registro </label>
                            <input type="datetime-local" name="fecha_registro" id="fecha_registro" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_envio_prestacion">Fecha de envio a prestaciones</label>
                            <input type="date" name="fecha_envio_prestacion" id="fecha_envio_prestacion"class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_recibido_prestacione">Fecha de recibido en prestaciones</label>
                            <input type="date" name="fecha_recibido_prestacione" id="fecha_recibido_prestacione" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_revision">Fecha de revision</label>
                            <input type="date" name="fecha_revision" id="fecha_revision" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="observacion">Observaciones</label>
                            <input type="text" name="observacion" id="observacion" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text"  name="estado" id="estado" class="form-control" value="Registrado" readonly>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="no_afiliado">No de afiliacion</label>
                            <input type="text" name="no_afiliado" id="no_afiliado" class="form-control" placeholder="">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_clinica_servicio">Clinica/Servicio</label>
                            <select class="form-control" name="id_clinica_servicio" id="id_clinica_servicio">
                                @foreach ($clinicas_servicios as $item)
                                <option value="{{$item->id_clinica_servicio}}">{{$item->nombre}}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_usuario_registrador">Usuario</label>
                            <input type="text"  name="id_usuario_registrador" id="id_usuario_registrador" class="form-control" value="6" readonly>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_usuario_revisor">revisor</label>
                            <input type="text"  name="id_usuario_revisor" id="id_usuario_revisor" class="form-control" value="" readonly>   
                        </div>
                    </div>

                </div>

                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('suspencions')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection