@if (!empty($data1['personaJuridica']['resultado']))
<table class="table table-bordered" style="text-align: center">
    <thead>
        <tr>
            <th>Zona</th>
            <th>Oficina</th>
            <th>Partida</th>
            <th>Tipo</th>
            <th>Denominación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data1['personaJuridica']['resultado'] as $item)
            <tr>
                <td>{{$item['zona']}}</td>
                <td>{{$item['oficina']}}</td>
                <td>{{$item['partida']}}</td>
                <td>{{$item['tipo']}}</td>
                <td>{{$item['denominacion']}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <h2>No hay resultados</h2>
@endif