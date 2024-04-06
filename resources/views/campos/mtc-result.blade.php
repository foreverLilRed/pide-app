@if ($data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['CodigoRespuesta']=='MSJ00')
            @php
                $licencia = $data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia'];
                $datos = [
                    'Tipo de Documento' => $licencia['TipoDoc'],
                    'Número de Documento' => $licencia['NroDocumento'],
                    'Correlato' => $licencia['Correlato'],
                    'Número de Licencia' => $licencia['NroLicencia'],
                    'Categoría' => $licencia['Categoria'],
                    'Apellido Paterno' => $licencia['ApellidoPaterno'],
                    'Apellido Materno' => $licencia['ApellidoMaterno'],
                    'Nombre' => $licencia['Nombre'],
                    'Departamento' => $licencia['Departamento'],
                    'Provincia' => $licencia['Provincia'],
                    'Distrito' => $licencia['Distrito'],
                    'Dirección' => $licencia['Direccion'],
                    'Fecha de Emisión' => $licencia['Fechaemision'],
                    'Fecha de Expedición' => $licencia['Fechaexpedicion'],
                    'Fecha de Revalidación' => $licencia['Fecharevalidacion'],
                    'Estado de Licencia' => $licencia['Estadolicencia'],
                ];
            @endphp
            <div id="tablas" class="w-100">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="bg-primary" >
                            <th style="text-align: center">Descripción</th>
                            <th style="text-align: center">Datos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $descripcion => $valor)
                            <tr>
                                <td style="text-align: center">{{ $descripcion }}</td>
                                <td style="text-align: center">{{ $valor }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['CodigoRespuesta']=='MSJ01')
            <b>El numero de documento no cuenta con licencia de conducir</b>
        @else
            <b>El numero de documento no cuenta con licencia de conducir</b>
        @endif