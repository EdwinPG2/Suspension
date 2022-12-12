@extends('layouts.admin')

@section('titulo')
    <span>Respuesta</span>
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Requerimiento No. {{ $requerimiento->no_requerimiento }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('respuesta.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Afiliado</h4>
                        </div>
                        <div class="row">
                            <input type="text" name="id_requerimiento" id="id_requerimiento"
                                value="{{ $requerimiento->id_requerimiento }}" hidden>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label for="no_afiliado">Número de afiliación</label>
                                    <input type="text" name="no_afiliado" id="no_afiliado" class="form-control"
                                        placeholder="Ingrese un numero" required maxlength="11" pattern="[0-9]*"
                                        title="Ingrese solamente numeros" value="{{ $requerimiento->no_afiliado }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre de afiliado</label>
                                    <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control"
                                        placeholder="" value="{{ $requerimiento->afiliado->nombre }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellido de afiliado</label>
                                    <input type="text" name="apellidos_afiliado" id="apellidos_afiliado"
                                        class="form-control" placeholder=""
                                        value="{{ $requerimiento->afiliado->apellidos }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="caso">Caso</label>
                                    <input type="text" name="caso" id="caso" class="form-control" required
                                        maxlength="25">
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Destino</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="destino_nombre">Nombre de destinatario</label>
                                    <input type="text" name="destino_nombre" id="destino_nombre" class="form-control"
                                        placeholder="" required maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="destino_area">Área de destino</label>
                                    <input type="text" name="destino_area" id="destino_area" class="form-control"
                                        placeholder="" required maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="destino_lugar">Lugar de destino</label>
                                    <input type="text" name="destino_lugar" id="destino_lugar" class="form-control"
                                        placeholder="" required maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <!--<label for="id_usuario_registrador">Usuario</label>  esto esta oculto-->
                                    <input type="hidden" name="id_usuario_registrador" id="id_usuario_registrador"
                                        class="form-control" value="{{ Auth::user()->id }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary">SIGUIENTE</button>
                            <a type="button" class="btn btn-danger" href="{{ url('createsuspencions') }}">CANCELAR</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



<script></script>
