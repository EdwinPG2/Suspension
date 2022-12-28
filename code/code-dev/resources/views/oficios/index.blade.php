@extends('layouts.admin')

@section('titulo')
    <span>Oficios</span>
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <h4>Listado de oficios</h4>
                        <ul>

                            @can('oficio-create')
                                <a type="button" class="btn btn-primary" href="{{ route('oficios.create') }}"><i
                                        class="fas fa-plus"></i>Nuevo</a>
                            @endcan
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt-oficios" class="table table-striped table-bordered dts">
                        <thead>
                            <th>Correlativo</th>
                            <th>Destinatario</th>
                            <th>Clinica-Servicio</th>
                            <th>Fecha</th>
                            <th>Estado</th>

                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($oficios as $item)
                                @if ($item->estado == 'Registrado' || $item->estado == 'En revisión')
                                    @if ($item->users_id_creador == Auth::user()->id || Auth::user()->id == 1)
                                        <tr class="text-center">
                                            <td>
                                                @if ($item->correlativo <= 9)
                                                    000{{ $item->correlativo }}
                                                @elseif($item->correlativo <= 99)
                                                    00{{ $item->correlativo }}
                                                @elseif($item->correlativo <= 990)
                                                    0{{ $item->correlativo }}
                                                @endif
                                                /
                                                {{ $item->fecha->translatedFormat('Y') }}
                                            </td>
                                            <td>{{ $item->destinatario }}</td>
                                            <td>{{ $item->dclinica_servicio->nombre }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                                            <td>{{ $item->estado }}</td>

                                            <td colspan="2">
                                                @can('oficio-edit')
                                                    @if ($item->estado == 'Registrado')
                                                        <a href="{{ route('editaroficios.edit', $item->id_oficio) }}"
                                                            class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('oficios.show', $item->id_oficio) }}"
                                                            class="btn btn-primary"><i class=""></i>Detalle</a>
                                                    @endcan
                                                @endif

                                                <a href="{{ route('oficios.edit', $item->id_oficio) }}"
                                                    class="btn btn-primary"><i class=""></i>PDF</a>

                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
