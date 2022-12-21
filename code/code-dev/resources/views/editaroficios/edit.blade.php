@extends('layouts.admin')

@section('titulo')
<span>Nuevo oficio</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos del oficio</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('editaroficios.update',$oficio->id_oficio) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="correlativo">Correlativo</label>
                                <input type="text" name="correlativo" id="correlativo" class="form-control" placeholder="Ingrese correlativo de oficio"
                                value="{{isset($oficio->correlativo)?$oficio->correlativo:''}}" required>   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="destinatario">Destinatario</label>
                                <input type="text" name="destinatario" id="destinatario" class="form-control" placeholder="Ingrese nombre del destinatario"
                                value="{{isset($oficio->destinatario)?$oficio->destinatario:''}}" required>   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control"
                                value="{{ date('Y-m-d', strtotime($oficio->fecha)) }}" required>   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Ingrese lugar"
                                value="{{isset($oficio->lugar)?$oficio->lugar:''}}" required>   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="users_id_creador">Usuario Registrador</label>
                                <input type="text" name="users_id_creador" id="users_id_creador" class="form-control" placeholder="" 
                                value="{{isset($oficio->users_id_creador)?$oficio->users_id_creador:''}}" readonly>   
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" placeholder=""  readonly
                                value="{{isset($oficio->estado)?$oficio->estado:''}}">   
                            </div>
                        </div>
                        

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="clinica_servicio">Clinica servicio</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="saludo">Saludo</label>
                                <input type="text" name="saludo" id="saludo" class="form-control" rows="3" placeholder="Ingrese un saludo"
                                value="{{isset($oficio->saludo)?$oficio->saludo:''}}" required>   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="despedida">Despedida</label>
                                <input type="text" name="despedida" id="despedida" class="form-control" rows="3" cols="50" placeholder="Ingrese una despedida"
                                value="{{isset($oficio->despedida)?$oficio->despedida:''}}" required>   
                            </div>
                        </div>
                    </div>
                    <hr> 
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('oficios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection