@extends('layouts.admin')

@section('titulo')
<span>Nueva suspencion</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar datos</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('createsuspencions.update', $suspencion->id_suspension) }}" method="post">
                @csrf   
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_inicio_suspension">Fecha de inicio de suspencion</label>
                            <input type="date" name="fecha_inicio_suspension" id="fecha_inicio_suspension" class="form-control" value="{{ $suspencion->fecha_inicio_suspension}}">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_fin_suspension">Fecha de finalizacion de suspencion</label>
                            <input type="date" name="fecha_fin_suspension" id="fecha_fin_suspension" class="form-control" value="{{ $suspencion->fecha_fin_suspension}}">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_alta">Fecha de alta</label>
                            <input type="date" name="fecha_alta" id="fecha_alta" class="form-control" value="{{ $suspencion->fecha_alta}}">   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="fecha_registro">Fecha de registro </label>
                            <input type="datetime-local" name="fecha_registro" id="fecha_registro" class="form-control" value="{{ $suspencion->fecha_registro}}"
                            readonly >   
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text"  name="estado" id="estado" class="form-control" value="Registrado" readonly>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_usuario_registrador">Usuario</label>
                            <input type="text"  name="id_usuario_registrador" id="id_usuario_registrador" class="form-control" value="10" readonly>   
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="no_afiliado">No de afiliacion</label>
                            <input type="text" name="no_afiliado" id="no_afiliado" class="form-control" value="{{ $suspencion->no_afiliado}}">   
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="btn_buscar">Presione el boton</label>
                            <input type="button" id = "btn_buscar_afiliado" name="btn_buscar"class="btn btn-primary" href="" value  ="Buscar afiliado" onclick="buscarAfiliado()">
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre de afiliado</label>
                            <input type="text" name="nombre_afiliado" id="nombre_afiliado" class="form-control" value="{{ $suspencion->afiliado->nombre}}" value="" disabled>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="apellidos">Apellido de afiliado</label>
                            <input type="text" name="apellidos_afiliado" id="apellidos_afiliado" class="form-control" value="{{ $suspencion->afiliado->apellidos}}" disabled>   
                        </div>
                    </div>
                
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="medico_colegiado">Colegiado Medico</label>
                            <input type="text" name="medico_colegiado" id="medico_colegiado" class="form-control" value="{{ $suspencion->medico_colegiado}}">  
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="btn_buscar">Presione el boton</label>
                            <input type="button" id = "btn_buscar_medico" name="btn_buscar"class="btn btn-primary" href="" value  ="Buscar medico" onclick="buscarMedico()">
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="nombre_medico">Nombres de medico</label>
                            <input type="text" name="nombre_medico" id="nombre_medico" class="form-control" value="{{ $suspencion->medico->nombres}}" value="" disabled>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="especialidad_medico">Especialidad del medico</label>
                            <input type="text" name="especialidad_medico" id="especialidad_medico" class="form-control" value="{{ $suspencion->medico->especialidad}}" value="" disabled>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="areas">Seleccione area</label>
                            <select class="form-control" name="areas" id="areas" onclick="cargar_especialidad()">
                                
                                @foreach ($areas as $item3)
                                <option 
                                @if ($item3->id_area == $suspencion->clinica_servicio->id_area)
                                    selected="select"
                                @endif
                                value="{{$item3->id_area}}" >{{$item3->nombre}}</option>
                                @endforeach
                            </select>   
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label for="id_clinica_servicio">Seleccione especialidad</label>
                            <select class="form-control" name="id_clinica_servicio" id="id_clinica_servicio">
                                <option value="{{ $suspencion->id_clinica_servicio}}" >{{ $suspencion->clinica_servicio->nombre}}</option>
                                
                            </select>   
                        </div>
                    </div>
                    

                </div>

                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">SIGUIENTE</button>
                        <a type="button" class="btn btn-danger" href="{{ url('createsuspencions')}}">CANCELAR</a>
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

        if(afiliado) {
        // Existe
        var i=document.getElementById("nombre_afiliado").value = afiliado.nombre;
        var i=document.getElementById("apellidos_afiliado").value = afiliado.apellidos;
        //alert("Encontrado");
        //console.log(permission);
        }
        else
        {
            alert("No se encuentra el afiliado");
            var i=document.getElementById("nombre_afiliado").value = "";
            var i=document.getElementById("apellidos_afiliado").value ="";
        }
    }
    function buscarMedico(evento) {
        event.preventDefault();
        let coleg = document.getElementById('medico_colegiado'); 
        
        list_medicos = @json($medicos);
        let medico = list_medicos.find(x => x.colegiado == coleg.value);

        if(medico) {
        // Existe
        var i=document.getElementById("nombre_medico").value = medico.nombres;
        var i=document.getElementById("especialidad_medico").value = medico.especialidad;
        //alert("Encontrado");
        //console.log(permission);
        }
        else
        {
            alert("No se encuentra el medico");
            var i=document.getElementById("nombre_medico").value = "";
            var i=document.getElementById("especialidad_medico").value = "";
        }
    }
window.onload=buscarAfiliado();
window.onload=buscarMedico();


function cargar_especialidad() {
    let area = document.getElementById('areas'); 

    list_especialidades = @json($clinicas_servicios); 
    let especialidades = list_especialidades.find(x => x.id_area == area.value);
    const result = list_especialidades.filter(a => a.id_area == area.value);
    console.log(area.value);
    console.log(especialidades);
    console.log(result);
    
    
    document.getElementById("id_clinica_servicio").innerHTML = "";
    var select = document.getElementsByName("id_clinica_servicio")[0];

    //for (var i=0; i<=select.length; i++) {
    //    select.remove(i);
    //}

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