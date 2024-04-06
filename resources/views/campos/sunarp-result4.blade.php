@if (!empty($data4['oficina']['oficina']))
            <table class="table table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th>Codigo de Zona</th>
                        <th>Codigo de Oficina</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data4['oficina']['oficina'] as $item)
                        <tr>
                            <td>{{ $item['codZona'] }}</td>
                            <td>{{ $item['codOficina'] }}</td>
                            <td>{{ $item['descripcion'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2>Datos Incorrectos</h2>
        @endif