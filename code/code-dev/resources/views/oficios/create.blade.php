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
                <form action="{{ route('oficios.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="correlativo">Correlativo</label>
                                <input type="text" name="correlativo" id="correlativo" class="form-control" placeholder="Ingrese correlativo de oficio">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="destinatario">Destinatario</label>
                                <input type="text" name="destinatario" id="destinatario" class="form-control" placeholder="Ingrese nombre del destinatario"
                        value="Delegación IGSS Quetzaltenango">   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="lugar">Lugar</label>
                                <input type="text" name="lugar" id="lugar" class="form-control" placeholder="Ingrese lugar"
                                value="Quetzaltenango">   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" placeholder="" value="Registrado" readonly>   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <input type="hidden" name="users_id_creador" id="users_id_creador" class="form-control" placeholder="" value="{{Auth::user()->id}}" readonly>   
                            </div>
                        </div>
                        
                        
                        

                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="saludo">Saludo</label>
                                <input type="text" name="saludo" id="saludo" class="form-control" rows="3" placeholder="Ingrese un saludo"
                                value="De manera atenta me dirijo a su persona para hacerle entrega de los siguientes formularios:">   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="despedida">Despedida</label>
                                <input type="text" name="despedida" id="despedida" class="form-control" rows="3" cols="50" placeholder="Ingrese una despedida"
                                value="Sin mas que agregar me despido desenado éxitos en sus actividades diarias">   
                            </div>
                        </div>
                    </div>
                    <div class ="row">
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
                    
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">SIGUIENTE</button>
                        <a type="button" class="btn btn-danger" href="{{ url('oficios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection