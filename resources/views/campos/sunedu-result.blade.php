@if($data['opConsultarRNGTResponse']['respuesta']['cGenerico']['$'] == '00000')
<div class="container" id="tablas">
    <table class="table table-bordered" style="text-align: center">
        <tbody>
            <tr>
                <th colspan="5" class="bg-primary text-white text-center font-weight-bold">Informacion del Usuario</th>
            </tr>                
            <tr>
                <td><strong>Tipo de Documento</strong></td>
                <td><strong>Numero de Documento</strong></td>
                <td><strong>Apellido Paterno</strong></td>
                <td><strong>Apellido Materno</strong></td>
                <td><strong>Nombres</strong></td>
            </tr>
            <tr>
                <td>{{ $data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona']['0']['tipoDocumento']['$'] }}</td>
                <td>{{ $data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona']['0']['nroDocumento']['$'] }}</td>
                <td>{{ $data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona']['0']['apellidoPaterno']['$'] }}</td>
                <td>{{ $data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona']['0']['apellidoMaterno']['$'] }}</td>
                <td>{{ $data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona']['0']['nombres']['$'] }}</td>
            </tr>
    <table>
            @foreach ($data['opConsultarRNGTResponse']['listaGTPersona']['gtPersona'] as $persona)
            <table class="table table-bordered" style="text-align: center">
                <tbody>
                    <tr>
                        <th class="bg-info text-white text-center font-weight-bold"><strong>Titulo Profesional:</strong></td>
                        <th class="bg-info text-white text-center font-weight-bold">{{ $persona['tituloProfesional']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Abreviatura de Título:</strong></td>
                        <td>{{ $persona['abreviaturaTitulo']['$'] == 'B' ? 'Bachiller' :  ($persona['abreviaturaTitulo']['$'] == 'T' ? 'Titulo Profesional' :( $persona['abreviaturaTitulo']['$'] == 'S' ? 'Segunda especialidad' : ($persona['abreviaturaTitulo']['$'] == 'M' ? 'G. Maestro' : 'G.Doctor' )))}}</td>
                    </tr>
                    <tr>
                        <td><strong>Universidad:</strong></td>
                        <td>{{ $persona['universidad']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Especialidad:</strong></td>
                        <td>{{ $persona['especialidad']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>País:</strong></td>
                        <td>{{ $persona['pais']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de Institución:</strong></td>
                        <td>{{ $persona['tipoInstitucion']['$'] == 'U' ? 'Universidad' : ($persona['tipoInstitucion']['$'] == 'E' ? 'Escuela' : 'Instituto')}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tipo de Gestión:</strong></td>
                        <td>{{ $persona['tipoGestion']['$'] == 'N' ? 'Nacional' : 'Privada'}}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Emisión:</strong></td>
                        <td>{{ $persona['fechaEmision']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Resolución:</strong></td>
                        <td>{{ $persona['resolucion']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Resolución:</strong></td>
                        <td>{{ $persona['fechaResolucion']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Flag Resolución de Nulidad:</strong></td>
                        <td>{{ $persona['flgResolucionNulidad']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Número de Resolución de Nulidad:</strong></td>
                        <td>{{ $persona['nroResolucionNulidad']['$'] }}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Resolución de Nulidad:</strong></td>
                        <td>{{ $persona['fechaResolucionNulidad']['$'] }}</td>
                    </tr>
                </tbody>
            </table>
    @endforeach
</div>
@else
    <p>{{$data['opConsultarRNGTResponse']['respuesta']['dGenerica']['$']}}</p>
@endif


