<table>
    <thead>
        <tr>
            <th>No afiliación</th>
            <th>Nombres</th>
            <th>Fecha inicio caso</th>
            <th>Fecha accidente</th>
            <th>fecha registro</th>
            <th>Riesgo</th>
            <th>Area</th>
            <th>Especialidad</th>
            <th>Clinica/Servicio</th>
            <th>Formularios</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->no_afiliado }}</td>
                <td>{{ $item->nombre_afiliado }} {{ $item->apellidos }}</td>
                <td>{{ $item->fecha_inicio_caso }}</td>
                <td>{{ $item->fecha_accidente }}</td>
                <td>{{ $item->fecha_registro }}</td>
                <td>{{ $item->nombre_riesgo }}</td>
                <td>{{ $item->nombre_area }}</td>
                <td>{{ $item->nombre_especialidad }}</td>
                <td>{{ $item->nombre_clinica_servicio }}</td>
                <td>{{ $item->Formularios }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
