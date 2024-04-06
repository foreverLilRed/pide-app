@if (!empty($data2['buscarTitularidadSIRSARPResponse']['respuestaTitularidad']['respuestaTitularidad']))
    <table class="table table-striped">
        <tbody>
            @foreach ($data2['buscarTitularidadSIRSARPResponse']['respuestaTitularidad']['respuestaTitularidad'] as $item)
                <tr>
                    <th>Registro:</th>
                    <td>{{ $item['registro'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Libro:</th>
                    <td>{{ $item['libro'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Ap. Paterno:</th>
                    <td>{{ $item['apPaterno'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Ap. Materno:</th>
                    <td>{{ $item['apMaterno'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $item['nombre'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Tipo de Documento:</th>
                    <td>{{ $item['tipoDocumento'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Número de Documento:</th>
                    <td>{{ $item['numeroDocumento'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Número de Partida / Número de Placa:</th>
                    <td>
                        @if (isset($item['numeroPartida']))
                            {{ $item['numeroPartida'] }}
                        @elseif (isset($item['numeroPlaca']))
                            {{ $item['numeroPlaca'] }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>{{ $item['estado'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Zona:</th>
                    <td>{{ $item['zona'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Oficina:</th>
                    <td>{{ $item['oficina'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Dirección:</th>
                    <td>{{ $item['direccion'] ?? '' }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Los datos son incorrectos</p>
@endif
