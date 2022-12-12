@extends('layouts.admin')

@section('titulo')
    <span>Editar suspensión</span>
@endsection
@section('contenido')
    <div class="row" onload="javascript:show()">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Agregar datos</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('createsuspencions.update', $suspencion->id_suspension) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h4>Afiliado</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <input type="text" name="no_afiliado" id="no_afiliado" class="form-control"
                                        placeholder="Ingrese un numero" value="{{ $suspencion->no_afiliado }}" required
                                        maxlength="11" pattern="[0-9]*" title="Ingrese solamente numeros">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <input type="button" id="btn_buscar_afiliado" name="btn_buscar"class="btn btn-primary"
                                        href="" value="Buscar afiliado" onclick="buscarAfiliado()">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre de afiliado</label>
                                    <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control"
                                        placeholder="" value="{{ $suspencion->afiliado->nombre }}" disabled>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="apellidos">Apellido de afiliado</label>
                                    <input type="text" name="apellidos_afiliado" id="apellidos_afiliado"
                                        class="form-control" placeholder=""
                                        value="{{ $suspencion->afiliado->apellidos }} "disabled>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Riesgo</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="id_riesgo">Seleccione riesgo (*)</label>
                                    <select class="form-control" name="id_riesgo" id="id_riesgo" required>
                                        @foreach ($riesgo as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_accidente">Fecha de accidente</label>
                                    <input type="date" name="fecha_accidente" id="fecha_accidente" class="form-control"
                                        value="{{ date('Y-m-d', strtotime($suspencion->fecha_accidente)) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Suspensión</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicio_caso">Fecha de inicio caso (*)</label>
                                    <input type="date" name="fecha_inicio_caso" id="fecha_inicio_caso"
                                        class="form-control"
                                        value="{{ date('Y-m-d', strtotime($suspencion->fecha_inicio_caso)) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicio_suspension">Fecha de inicio de suspensión (*)</label>
                                    <input type="date" name="fecha_inicio_suspension" id="fecha_inicio_suspension"
                                        class="form-control"
                                        value="{{ date('Y-m-d', strtotime($suspencion->fecha_inicio_suspension)) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_fin_suspension">Fecha de finalizacion de suspensión (*)</label>
                                    <input type="date" name="fecha_fin_suspension" id="fecha_fin_suspension"
                                        class="form-control"
                                        value="{{ date('Y-m-d', strtotime($suspencion->fecha_fin_suspension)) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_alta">Fecha de alta</label>
                                    <input type="date" name="fecha_alta" id="fecha_alta" class="form-control"
                                        value="{{ date('Y-m-d', strtotime($suspencion->fecha_alta)) }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="fecha_registro">Fecha de registro (*)</label>
                                    <input type="datetime-local" name="fecha_registro" id="fecha_registro"
                                        class="form-control" value="{{ $suspencion->fecha_registro }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <input type="text" name="estado" id="estado" class="form-control"
                                        value="Registrado" readonly>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <!--<label for="id_usuario_registrador">Usuario</label>  esto esta oculto-->
                                    <input type="hidden" name="id_usuario_registrador" id="id_usuario_registrador"
                                        class="form-control" value="{{$suspencion->users_id_registrador}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Médico</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <input type="text" name="medico_colegiado" id="medico_colegiado"
                                        class="form-control" placeholder="Ingrese un colegiado"
                                        value="{{ $suspencion->medico_colegiado }}" required maxlength="11" pattern="[0-9]*" title="Ingrese solamente numeros">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <input type="button" id="btn_buscar_medico"
                                        name="btn_buscar"class="btn btn-primary" href="" value="Buscar medico"
                                        onclick="buscarMedico()">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre_medico">Nombres de médico</label>
                                    <input type="text" name="nombre_medico" id="nombre_medico" class="form-control"
                                        placeholder="" value="{{ $suspencion->medico->nombres }}" disabled>
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

                                        @foreach ($areas as $item3)
                                            <option @if ($item3->id_area == $suspencion->clinica_servicio->id_area) selected="select" @endif
                                                value="{{ $item3->id_area }}">{{ $item3->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="especialidad">Seleccione especialidad</label>
                                    <select class="form-control" name="especialidad" id="especialidad"
                                        onclick="cargar_clinica_servicios()">
                                        <option value="{{ $suspencion->clinica_servicio->id_especialidad }}">
                                            {{ $suspencion->clinica_servicio->especialidad->nombre_especialidad }}</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="id_clinica_servicio">Seleccione clinica/servicio (*)</label>
                                    <select class="form-control" name="id_clinica_servicio" id="id_clinica_servicio" required>
                                        <option value="{{ $suspencion->clinica_servicio->id_clinica_servicio }}">
                                            {{ $suspencion->clinica_servicio->nombre }}</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>Colaborador</h4>
                            <input type="checkbox" id="check" name="check"
                                value="{{ isset($suspencion->afiliado->colaborador) ? $suspencion->afiliado->colaborador : '' }}"
                                onchange="javascript:showContent()" @if ($suspencion->afiliado->colaborador == 'Y') checked @endif>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre_medico">IBM</label>
                                    <input type="text" name="ibm" id="ibm" class="form-control"
                                        placeholder="" value="{{ $suspencion->afiliado->ibm }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="cargo">Seleccione cargo/puesto</label>
                                    <select class="form-control" name="cargo" id="cargo">
                                        @foreach ($cargos as $item)
                                            <option value="{{ $item->id_cargo }}"
                                                @if ($suspencion->afiliado->id_cargo == $item->id_cargo) selected="select" @endif>
                                                {{ $item->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="dependencia">Seleccione dependencia</label>
                                    <input type="text" name="dependencia" id="dependencia" class="form-control"
                                        placeholder=""
                                        value="{{ isset($suspencion->afiliado->dependencia) ? $suspencion->afiliado->dependencia : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-between">
                            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                            <a type="button" class="btn btn-danger" href="javascript:history.back()">REGRESAR</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    function buscarAfiliado(evento) {
        event.preventDefault();
        let no_af = document.getElementById('no_afiliado');

        list_afiliados = @json($afiliados);
        let afiliado = list_afiliados.find(x => x.no_afiliado == no_af.value);

        if (afiliado) {
            // Existe
            var i = document.getElementById("nombre_afiliado").value = afiliado.nombre;
            var i = document.getElementById("apellidos_afiliado").value = afiliado.apellidos;
            //alert("Encontrado");
            //console.log(permission);
        } else {
            alert("No se encuentra el afiliado");
            var i = document.getElementById("nombre_afiliado").value = "";
            var i = document.getElementById("apellidos_afiliado").value = "";
        }
    }

    function buscarMedico(evento) {
        event.preventDefault();
        let coleg = document.getElementById('medico_colegiado');

        list_medicos = @json($medicos);
        let medico = list_medicos.find(x => x.colegiado == coleg.value);

        if (medico) {
            // Existe
            var i = document.getElementById("nombre_medico").value = medico.nombres;
            var i = document.getElementById("especialidad_medico").value = medico.especialidad;
            //alert("Encontrado");
            //console.log(permission);
        } else {
            alert("No se encuentra el medico");
            var i = document.getElementById("nombre_medico").value = "";
            var i = document.getElementById("especialidad_medico").value = "";
        }
    }
    window.onload = buscarAfiliado();
    window.onload = buscarMedico();


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

    // Rutina para agregar opciones a un <select>
    function addOptions(domElement, array) {

    }
</script>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("colaborador");
        check = document.getElementById("check");
        if (check.checked) {

            check.value = "Y";
        } else {
            check.value = "N";
        }
    }

    function show() {
        element = document.getElementById("colaborador");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display = 'block';
            check.value = "Y";
        } else {
            element.style.display = 'none';
            check.value = "N";
        }
    }
</script>
