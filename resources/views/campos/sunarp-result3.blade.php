@if (!empty($data3['buscarTitularidadSIRSARPResponse']['respuestaTitularidad']['respuestaTitularidad']))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Libro</th>
                        <th>Razón Social</th>
                        <th>Documento</th>
                        <th>Número de Partida</th>
                        <th>Estado</th>
                        <th>Zona</th>
                        <th>Oficina</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data3['buscarTitularidadSIRSARPResponse']['respuestaTitularidad']['respuestaTitularidad'] as $item)
                        <tr>
                            <td>{{ $item['registro'] }}</td>
                            <td>{{ $item['libro'] }}</td>
                            <td>{{ $item['razonSocial'] }}</td>
                            <td>{{ $item['tipoDocumento'] }} {{ $item['numeroDocumento'] }}</td>
                            <td>{{ $item['numeroPartida'] }}</td>
                            <td>{{ $item['estado'] }}</td>
                            <td>{{ $item['zona'] }}</td>
                            <td>{{ $item['oficina'] }}</td>
                            <td>{{ $item['direccion'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2>Datos Incorrectos</h2>
        @endif