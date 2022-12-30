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
                                        title="Ingresar solamente numeros"
                                        value="{{ isset($afiliado->no_afiliado) ? $afiliado->no_afiliado : '' }}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre de afiliado</label>
                                    <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control"
                                        placeholder="" value="{{ isset($afiliado->nombre) ? $afiliado->nombre : '' }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellido de afiliado</label>
                                    <input type="text" name="apellidos_afiliado" id="apellidos_afiliado"
                                        class="form-control" placeholder=""
                                        value="{{ isset($afiliado->apellidos) ? $afiliado->apellidos : '' }}" disabled>
                                </div>
                            </div>
                        </div>


                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary">BUSCAR</button>

                        </div>
                    </form>
                    @if ($fin != null)
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
                                    <th>Cliínica/Servicio</th>
                                    <th>Observación</th>
                                    <th>Estado</th>
                                    <th>Fecha de registro</th>
                                    <th>Oficio</th>

                                </thead>
                                <tbody>
                                    @foreach ($fin as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->desuspension->afiliado->no_afiliado }}</td>
                                            <td>{{ $item->desuspension->afiliado->nombre }}
                                                {{ $item->desuspension->afiliado->apellidos }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_caso)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_inicio_suspension)) }}
                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_fin_suspension)) }}
                                            </td>
                                            @if (date('d-m-Y', strtotime($item->desuspension->fecha_alta)) != '31-12-1969')
                                                <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_alta)) }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>{{ $item->desuspension->clinica_servicio->nombre }}</td>
                                            <td>{{ $item->desuspension->observacion }}</td>
                                            <td>{{ $item->desuspension->estado }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->desuspension->fecha_registro)) }}</td>
                                            <td>
                                                @if ($item->doficio->correlativo <= 9)
                                                    000{{ $item->doficio->correlativo }}
                                                @elseif($item->doficio->correlativo <= 99)
                                                    00{{ $item->doficio->correlativo }}
                                                @elseif($item->doficio->correlativo <= 990)
                                                    0{{ $item->doficio->correlativo }}
                                                @endif
                                                /
                                                {{ $item->doficio->fecha->translatedFormat('Y') }}
                                                {{ $item->doficio->dclinica_servicio->descripcion }}
                                            </td>
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
