@extends('layouts.admin')

@section('titulo')
<span>Nueva Revision</span>
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4>Crear Revision Formulario</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('revofi.store') }}" method="post">
                @csrf   
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="fecha_rev">Fecha de Revisión</label>
                                <input type="date" name="fecha_rev" id="fecha_rev" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="id_oficio">Oficio</label>
                                <select class="form-control" name="id_oficio" id="id_oficio">
                                    @foreach ($oficios as $item)
                                    <option value="{{$item->id_oficio}}">{{$item->correlativo}}</option>
                                    @endforeach
                                </select>   
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label for="id_usuario">Usuario</label>
                                <input type="text"  name="id_usuario" id="id_usuario" class="form-control" value="6" readonly>   
                            </div>
                        </div>

                    </div>

                    <hr>
                    <div class="row justify-content-between">
                        <button type="submit" class="btn btn-primary">GUARDAR</button>
                        <a type="button" class="btn btn-danger" href="{{ url('formularios')}}">CANCELAR</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection