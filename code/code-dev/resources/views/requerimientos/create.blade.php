@extends('layouts.admin')

@section('titulo')
<span>Nuevos requerimientos</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Agregar requerimiento</h4>
            </div>
            <div class="card-body">
                
                <form action="{{ route('revreq.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-2 col-md-2">
                            <div class="form-group">
                                <input type="text" name="no_afiliado" id="no_afiliado" class="form-control"
                                    placeholder="Ingrese un numero" required maxlength="11" pattern="[0-9]*" title="Ingrese solamente numeros">
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
                                    placeholder="" value="" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="apellidos">Apellido de afiliado</label>
                                <input type="text" name="apellidos_afiliado" id="apellidos_afiliado"
                                    class="form-control" placeholder="" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="no_requerimiento">Requerimiento no:</label>
                                <input type="text" name="no_requerimiento" id="no_requerimiento"
                                    class="form-control" placeholder="">
                            </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_requerimiento">Fecha de requerimiento</label>
                                <input type="date" name="fecha_requerimiento" id="fecha_requerimiento" class="form-control" placeholder="">   
                            </div>
                        </div>
                        
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" id="estado" class="form-control" placeholder=" ">   
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="Ingrese observación">   
                            </div>
                        </div>
                    
                    
                    
                    <hr>
                    <div class="col-lg-8 col-md-8">
                        <div class="form-group">
                            <label for="archivo">Adjunte archivo</label>
                             <input type="file" name="archivo" id="archivo" class="form-control-file">
                        </div>
                    </div>

                    </div>
                
                    
                    <div class="row justify-content-between">
                        
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                    <a type="button" class="btn btn-danger" href="{{ url('revreq') }}">CANCELAR</a>
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
</script>

