@extends('layouts.admin')

@section('titulo')
<span>REPORTERIA IGSS</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4>Reportes personalizados</h4>
                </div>
            </div>
            <div class="card-body">


                <h5>Suspensiones por campos:</h5>
                <form action="{{ route('revofi.store') }}" method="post">
                    @csrf   
                    <div class="row">
                
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="clinica_servicio">Seleccione area</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="clinica_servicio">Seleccione Especialidad</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="clinica_servicio">Seleccione Servicio</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button type="submit" class="btn btn-success"><i class="fas fa-file-alt"></i>Generar<br>Reporte</button>  
                        </div>
                    </div>        
                </form>
                

                <h5>Por estado de la suspension:</h5>
                <form action="{{ route('revofi.store') }}" method="post">
                    @csrf   
                    <div class="row">
                
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="estado">Seleccion el tipo de suspensiones:</label>
                                <select name="estado" id="estado" class="form-control select2">
                                    <option value="Rechazado">RECHAZADOS</option>
                                    <option value="Archivado">ARCHIVADOS</option> 
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="clinica_servicio">Seleccione Especialidad</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                 
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button type="submit" class="btn btn-success"><i class="fas fa-file-alt"></i> Generar<br>Reporte</button>  
                        </div>
                    </div>        
                </form>


                <h5>Listados de oficios enviados a caja:</h5>
                <form action="{{ route('revofi.store') }}" method="post">
                    @csrf   
                    <div class="row">
                
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label for="estado">Suspensiones por personal:</label>
                                <select name="estado" id="estado" class="form-control select2">
                                    <option value="Rechazado">RECHAZADOS</option>
                                    <option value="Archivado">ARCHIVADOS</option> 
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="clinica_servicio">Oficios de requerimientos</label>
                                <select name="clinica_servicio" id="clinica_servicio" class="form-control select2">
                                    @foreach($clinicas as  $item)
                                    <option value="{{ $item->id_clinica_servicio }}">{{ $item->nombre }}</option>
                                    @endforeach   
                                </select>   
                            </div>
                        </div>
        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                 
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button type="submit" class="btn btn-success"><i class="fas fa-file-alt"></i>Generar<br>Reporte</button>  
                        </div>
                    </div>        
                </form>
            </div>
        </div>
    </div>
</div>
@endsection