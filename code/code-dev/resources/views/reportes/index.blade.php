@extends('layouts.admin')

@section('titulo')
    <span>Reportes</span>
@endsection
@section('contenido')
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <label for="reporte">Seleccione reporte</label>
            <select class="form-control" name="reporte" id="reporte" onchange="javascript:showContent()">
                <option value="0"  selected>-- Seleccione reporte --</option>
                <option value="1">Suspenciones por area, especialidad, clinica/servicio</option>
                <option value="2">Suspenciones de colaboradores</option>

            </select>
        </div>
    </div>
    <div id="cont_clinica" style="display:none;">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card mb-4">
                    <form action="{{ route('reportes.store') }}" method="post">
                        @csrf
                        <input type="text" hidden name="condicion" id="condicion"class="form-control" value="0">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <h4>Area, Especialidad, Clinica/Servicios</h4>
                            </div>
                            <div class="row justify-content-between">
                                <h5>Seleccione rango de fechas</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="date" name="fechai" id="fechai"class="form-control" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="date" name="fechaf" id="fechaf" max= "{{date('Y-m-d')}}" class="form-control" value=""
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Clinica/Servicio</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="areas">Seleccione area</label>
                                    <select class="form-control" name="areas" id="areas"
                                        onclick="cargar_especialidad()">
                                        <option value="">-- Seleccione un area --</option>
                                        @foreach ($areas as $item3)
                                            <option value="{{ $item3->id_area }}">{{ $item3->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="especialidad">Seleccione especialidad</label>
                                    <select class="form-control" name="especialidad" id="especialidad"
                                        onclick="cargar_clinica_servicios()">
                                        <option value="">-- Seleccione especialidad --</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="id_clinica_servicio">Seleccione clinica/servicio</label>
                                    <select class="form-control" name="id_clinica_servicio" id="id_clinica_servicio">
                                        <option value="">-- Seleccione clinica/servicio --</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Descargar reporte <i
                                            class="fas fa-download"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div id="cont_colaborador" style="display:none;">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card mb-4">
                    <form action="{{ route('reportes.store') }}" method="post">
                        @csrf
                        <input type="text" hidden name="condicion" id="condicion"class="form-control" value="1">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <h4>Colaboradores, Riesgo, Puesto, Cargo/Dependencia</h4>
                            </div>
                            <div class="row justify-content-between">
                                <h5>Seleccione rango de fechas</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="date" name="fechai" id="fechai"class="form-control" value=""
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="date" name="fechaf" id="fechaf" max= "{{date('Y-m-d')}}" class="form-control" value=""
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Tipo de reporte</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="reporte_colaborador">Seleccione reporte</label>
                                    <select class="form-control" name="reporte_colaborador" id="reporte_colaborador"
                                        onclick="cargar_info()" required>
                                        <option value="" disabled selected>-- Seleccione un reporte --</option>
                                        
                                        <option value="1">Riesgo</option>
                                        <option value="2">Dependencia</option>
                                        <option value="3">Cargo/Puesto</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="seleccion">Seleccione una opcion</label>
                                    <select class="form-control" name="seleccion" id="seleccion" required>
                                        <option value="">--  --</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Descargar reporte <i
                                            class="fas fa-download"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("cont_clinica");
        check = document.getElementById("reporte");
        if (check.value==1) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }

        element = document.getElementById("cont_colaborador");
        if (check.value==2) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>

<script>
    function cargar_info() {
        let area = document.getElementById('areas');

        list_riesgos = @json($riesgos);
        list_dependencias = @json($dependencias);
        list_cargos = @json($cargos);

        
        check = document.getElementById("reporte_colaborador");
        document.getElementById("seleccion").innerHTML = "";
        var select = document.getElementsByName("seleccion")[0];
        
        if (check.value==1) {
            for (let x = 0; x < list_riesgos.length; x++) {
            
                var option = document.createElement("option");
                option.value = list_riesgos[x].id;
                option.text = list_riesgos[x].nombre;
                select.add(option);
            
        
        }}
        if (check.value==2) {
            for (let x = 0; x < list_riesgos.length; x++) {
            
                var option = document.createElement("option");
                option.value = list_dependencias[x].id_dependencia;
                option.text = list_dependencias[x].nombre;
                select.add(option);
            
        
        }}
        if (check.value==3) {
            for (let x = 0; x < list_riesgos.length; x++) {
            
                var option = document.createElement("option");
                option.value = list_cargos[x].id_cargo;
                option.text = list_cargos[x].nombre;
                select.add(option);
            
        
        }}

    }

    function cargar_especialidad() {
        let area = document.getElementById('areas');

        list_clinicas_servicios = @json($clinicas_servicios);
        list_especialidades = @json($especialidads);
        //let especialidades = list_especialidades.find(x => x.id_area == area.value);
        let result = list_clinicas_servicios.filter(a => a.id_area == area.value);

        const result_especialidad = list_especialidades.map(esp => {
            for (let i = 0; i < result.length; i++) {
                if (esp.id_especialidad == result[i].id_especialidad) {
                    return esp;
                }
            }
        });
        //console.log(result_especialidad);


        document.getElementById("especialidad").innerHTML = "";
        document.getElementById("id_clinica_servicio").innerHTML = ""; //para limpiar el ultimo nivel

        var select = document.getElementsByName("especialidad")[0];

        var option = document.createElement("option");
        option.value = "";
        option.text = "-- Seleccione especialidad --";
        select.add(option);

        for (let x = 0; x < result_especialidad.length; x++) {
            if (result_especialidad[x] != undefined) {
                var option = document.createElement("option");
                option.value = result_especialidad[x].id_especialidad;
                option.text = result_especialidad[x].nombre_especialidad;
                select.add(option);
            }
        }

    }

    function cargar_clinica_servicios() {
        let area = document.getElementById('areas');
        let especialidad = document.getElementById('especialidad');

        list_clinicas_servicios = @json($clinicas_servicios);

        filtro_area = list_clinicas_servicios.filter(x => x.id_area == area.value);
        result = filtro_area.filter(x => x.id_especialidad == especialidad.value);;

        document.getElementById("id_clinica_servicio").innerHTML = "";
        var select = document.getElementsByName("id_clinica_servicio")[0];

        //console.log(filtro_area);
        //console.log(list_clinicas_servicios);
        var option = document.createElement("option");
        option.value = "";
        option.text = "-- Seleccione clinica/servicio --";
        select.add(option);


        for (x in result) {
            var option = document.createElement("option");
            option.value = result[x].id_clinica_servicio;
            option.text = result[x].nombre;
            select.add(option);
        }

    }
</script>
