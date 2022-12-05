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

                            <div class="col-lg-8 col-md-8">
                                <div class="form-group">
                                    <label for="destinatario">Destinatario</label>
                                    <input type="text" name="destinatario" id="destinatario" class="form-control"
                                        placeholder="Ingrese nombre del destinatario" value="Registros Médicos " required
                                        maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <input type="datetime-local" name="fecha" id="fecha" class="form-control" placeholder="" value="{{ $ldate = date('Y-m-d H:i:s') }}"
                                    readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="lugar">Lugar</label>
                                    <input type="text" name="lugar" id="lugar" class="form-control"
                                        placeholder="Ingrese lugar" value="IGSS, Hospital General de Quetzaltenango"
                                        required maxlength="50">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" id="estado" class="form-control" placeholder=""
                                        value="Registrado" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="hidden" name="users_id_creador" id="users_id_creador" class="form-control"
                                        placeholder="" value="{{ Auth::user()->id }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="saludo">Saludo</label>
                                    <input type="text" name="saludo" id="saludo" class="form-control" rows="3"
                                        placeholder="Ingrese un saludo"
                                        value="De manera atenta me dirijo a ustedes para trasladar los documentos de pago de los siguientes afiliados (as) por: APERTURA, CONTINUACIÓN Y TRASLADO: " required maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="despedida">Despedida</label>
                                    <input type="text" name="despedida" id="despedida" class="form-control"
                                        rows="3" cols="50" placeholder="Ingrese una despedida"
                                        value="Sin otro particular me suscribo atentamente, " required maxlength="250">
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Clinica/Servicio</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="areas">Seleccione área</label>
                                    <select class="form-control" name="areas" id="areas"
                                        onclick="cargar_especialidad()">
                                        <option value="" disabled="disabled">-- Seleccione un área</option>
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
                                        <option value="" disabled="disabled">-- Seleccione especialidad</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="id_clinica_servicio">Seleccione clinica/servicio (*)</label>
                                    <select class="form-control" name="id_clinica_servicio" id="id_clinica_servicio" required>
                                        <option value="" disabled="disabled">-- Seleccione clinica/servicio</option>

                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary">SIGUIENTE</button>
                            <a type="button" class="btn btn-danger" href="{{ url('oficios') }}">CANCELAR</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
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

        for (x in result) {
            var option = document.createElement("option");
            option.value = result[x].id_clinica_servicio;
            option.text = result[x].nombre;
            select.add(option);
        }

    }
</script>
