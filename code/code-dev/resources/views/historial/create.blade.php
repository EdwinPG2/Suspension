@extends('layouts.admin')

@section('titulo')
    <span>Busqueda de suspensiones de un afiliado</span>
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Listado de suspensiones</h4>
                </div>
                <div class="card-body">
                    <form id="myForm" action="{{ route('historial.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Afiliado</h4>
                        </div>
                        <p id="log"></p>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label for="nombre">Número de afiliación</label>
                                    <input type="text" name="no_afiliado" id="no_afiliado" class="form-control"
                                        placeholder="Ingrese un número" required maxlength="13" pattern="[0-9]*"
                                        title="Ingresar solamente numeros" value="{{ isset($afiliado->no_afiliado) ? $afiliado->no_afiliado : '' }}">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre de afiliado</label>
                                    <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control"
                                        placeholder="" value="{{ isset($afiliado->nombre) ? $afiliado->nombre : '' }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellido de afiliado</label>
                                    <input type="text" name="apellidos_afiliado" id="apellidos_afiliado"
                                        class="form-control" placeholder="" value="{{ isset($afiliado->apellidos) ? $afiliado->apellidos : '' }}" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary">BUSCAR</button>
                            
                        </div>
                    </form>
                    @if ($suspencions!=null)
                    <div class="card-body">
                        <table id="dt-suspencions" class="table table-striped table-bordered dts">
                            <thead>
                                <!--<th>Id</th>-->
                                <th>No. afiliación</th>
                                <th>Nombres</th>
                                <th>Fecha de inicio caso</th>
                                <th>Fecha de inicio suspensión</th>
                                <th>Fecha de fin suspensión</th>
                                <th>Fecha de alta</th>
                                <th>Clinica/Servicio</th>
                                <th>Observación</th>
                                <th>Estado</th>
                                <th>Fecha de registro</th>

                            </thead>
                            <tbody>
                                @foreach($suspencions as $item)
                                <tr class="text-center">
                                    <td>{{$item->afiliado->no_afiliado}}</td>
                                    <td>{{$item->afiliado->nombre}} {{$item->afiliado->apellidos}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->fecha_inicio_caso)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->fecha_inicio_suspension)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->fecha_fin_suspension)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->fecha_alta)) }}</td>
                                    <td>{{$item->clinica_servicio->nombre}}</td>
                                    <td>{{ $item->observacion }}</td>
                                    <td>{{ $item->estado }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->fecha_registro))}}</td>
        
                                    
                                </tr>
                                @endforeach                
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


