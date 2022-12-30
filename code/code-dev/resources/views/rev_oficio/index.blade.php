@extends('layouts.admin')

@section('titulo')
<span>Revisión de Oficios</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div align="left">
                    <h4>Seleccione que tipo de oficios desea ver:</h4>
                    <a href="{{route('revofi.index')}}" class="btn btn-info">Pendientes de revisar</a>
                    <a href="{{route('ofi.index')}}" class="btn btn-success">Enviados a delegación</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <h4>Filtrado de Fechas</h4>
                <div class="row justify-content-between">
                    
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            Fecha Inicio: <br>
                            <input type="date" name="fechai" id="fechai"class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            Fecha Final: <br>
                            <input type="date" name="fechaf" id="fechaf"class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <br>
                            <button class="btn btn-info" onclick="Fechas()"><i class="fas fa-filter"></i>
                                Filtrar
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="card-body">
                <table id="dt-formularios" class="table table-striped table-bordered dts">
                    <thead>
                        <th>ID</th>
                        <th>Fecha revisado</th>
                        <th>Destinatario</th>
                        <th>Estado del oficio</th>
                        <th>Correlativo</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        @foreach($oficios as $item)
                        @if($item->estado == $congelados)
                        <tr class="text-center">
                            <td>{{ $item->id_oficio }}</td>
                            <td>{{ date('d-m-Y', strtotime($item->fecha)) }}</td>
                            <td>{{ $item->destinatario}}</td>
                            <td>{{ $item->estado}}</td>
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
                                                {{ $item->dclinica_servicio->descripcion }}
                            </td>
                        
                            <td>
                                @if($item->estado != 'Congelado')
                                <a href="{{ route ('revofi.edit', $item->id_oficio) }}"
                                        class="btn btn-warning"><i class="fas fa-edit"></i> Revisar</a>
                                     
                                <!--PDF sin revisar-->
                                <a href="{{ route('oficios.edit', $item->id_oficio) }}" class="btn btn-primary"><i class="fas fa-check-circle"></i> PDF</a>
                                
                                @endif
                                @if($item->estado == 'Congelado')
                                    <!--PDF de suspensiones aceptadas-->
                                <a href="{{ route('ofi.edit', $item->id_oficio) }}" class="btn btn-success" target="_blank"><i class="fas fa-check-circle"></i> PDF</a>
                                <!--PDF de suspensiones rechazadas-->
                                <a type="button" class="btn btn-danger" href="{{ route('gen.show', $item->id_oficio) }}" target="_blank"><i class="fas fa-times-circle"></i> PDF</a>
                                @endif
                            </td>
                                  
                        </tr>
                        @endif
                        @endforeach                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function Fechas() {
        //$("#dt-articulos").remove();
        var input, filter, table, tr, td, i, j, visible, th, thead;
        fechai = document.getElementById("fechai");
        fechaf = document.getElementById("fechaf");
        var dateFrom = $('#fechai').val();
        var dateTo = $('#fechaf').val();
        filter = fechai.value.toUpperCase();
        table = document.getElementById("dt-formularios");
        tr = table.getElementsByTagName("tr");
        thead = table.getElementsByTagName("thead");

        
        
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            visible = false;
            /* Obtenemos todas las celdas de la fila, no sólo la primera */
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                //console.log(td[4].innerHTML);
                //console.log(dateFrom);
                if ((dateFrom == '' && dateTo == '') ||
                    (dateFrom == '' && td[1].innerHTML <= dateTo) ||
                    (dateFrom <= td[1].innerHTML && dateTo == '') ||
                    (dateFrom <= td[1].innerHTML && td[1].innerHTML <= dateTo)) {
                    
                    visible = true;
                }
            }
            if (visible === true) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
</script>
@endsection