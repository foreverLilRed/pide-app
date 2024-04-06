<div class="row mb-4">
    @if ($data['GetDataResponse']['GetDataResult']['DATA']==NULL)
        <h4>{{$data['GetDataResponse']['GetDataResult']['MENSAJE']}}</h4>
    @else
        @php
            $titulo = $data['GetDataResponse']['GetDataResult']['DATA']['TituloContract'];
            $datos = [
                'Tipo de Documento' => $titulo['DOCU_TIP'],
                'Numero de Documento' => $titulo['DOCU_NUM'],
                'Apellido Materno' => $titulo['APEMAT'],
                'Apellido Paterno' => $titulo['APEPAT'],
                'Nombres' => $titulo['NOMBRES'],
                'Nombre de Titular' => $titulo['NOMBRE_TITU'],
                'Nivel' => $titulo['NIVEL'],
                'Institución Educativa' => $titulo['NOMBRE_IE'],
                'Titulo' => $titulo['TITU_FEC'],
                'Pais/Región' => $titulo['PAIS_REGION'],
                'Numero de Titular' => $titulo['NUM_TITU'],
            ];
        @endphp
        <div id="tablas">
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-primary" >
                    <th style="text-align: center">Descripción</th>
                    <th style="text-align: center">Datos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $descripcion => $valor)
                    <tr >
                        <td style="text-align: center">{{ $descripcion }}</td>
                        <td style="text-align: center">{{ $valor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @endif
</div>