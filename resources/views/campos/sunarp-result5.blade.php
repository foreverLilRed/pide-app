@if (!empty($data5['verDetalleRPVExtraResponse']['vehiculo']['placa']))
            <table class="table table-striped" style="text-align: center">
                <tbody>
                    <tr>
                        <th>Placa</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['placa'] }}</td>
                    </tr>
                    <tr>
                        <th>Serie</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['serie'] }}</td>
                    </tr>
                    <tr>
                        <th>VIN</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['vin'] }}</td>
                    </tr>
                    <tr>
                        <th>Número de Motor</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['nro_motor'] }}</td>
                    </tr>
                    <tr>
                        <th>Color</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['color'] }}</td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['marca'] }}</td>
                    </tr>
                    <tr>
                        <th>Modelo</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['modelo'] }}</td>
                    </tr>
                    <tr>
                        <th>Estado</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['estado'] }}</td>
                    </tr>
                    <tr>
                        <th>Sede</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['sede'] }}</td>
                    </tr>
                    <tr>
                        <th>Año de Fabricación</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['anoFabricacion'] }}</td>
                    </tr>
                    <tr>
                        <th>Código de Categoría</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['codCategoria'] }}</td>
                    </tr>
                    <tr>
                        <th>Código de Tipo de Carrocería</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['codTipoCarr'] }}</td>
                    </tr>
                    <tr>
                        <th>Tipo de Carrocería</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['carroceria'] }}</td>
                    </tr>
                    <tr>
                        <th>Propietarios</th>
                        <td>{{ $data5['verDetalleRPVExtraResponse']['vehiculo']['propietarios']['nombre'] ?? '' }}</td>
                    </tr>
                </tbody>
            </table>

        @else
            <p class="alert alert-info">No se encontraron resultados para el vehículo.</p>
        @endif