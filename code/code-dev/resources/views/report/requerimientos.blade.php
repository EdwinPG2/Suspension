<table>
    <thead>
        <tr>
            <th>No. requerimiento</th>
            <th>Fecha de requerimiento</th>
            <th>No afiliación</th>
            <th>Nombres</th>
            <th>Estado</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->no_requerimiento }}</td>
                <td>{{ $item->fecha_requerimiento }}</td>
                <td>{{ $item->no_afiliado }}</td>
                <td>{{ $item->nombre }} {{ $item->apellidos }}</td>
                <td>{{ $item->estado }}</td>
                <td>{{ $item->observaciones }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
