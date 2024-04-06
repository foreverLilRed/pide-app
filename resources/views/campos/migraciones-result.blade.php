<div id='tablas' class="w-100">
    @if($data['consultarDocumentoResponse']['return']['strNumRespuesta'] == '0000')
        <div class="container border border-black rounded p-4">
            <div class="row">
                <div class="col-12 col-lg-7 m-2">
                    <p class="text-start" style="text-align: center"><b>Calidad Migratoria: </b>{{ $data['consultarDocumentoResponse']['return']['strCalidadMigratoria'] }}</p>
                    <p class="text-start"><b>Nombres: </b>{{ $data['consultarDocumentoResponse']['return']['strNombres'] }}</p>
                    <p class="text-start"><b>Primero Apellido: </b>{{ $data['consultarDocumentoResponse']['return']['strPrimerApellido']}}</p>
                    <p class="text-start"><b>Segundo Apellido: </b>{{$data['consultarDocumentoResponse']['return']['strSegundoApellido']}}</p>
                </div>
            </div>
        </div>
    @else
        <p>Dato no encontrado, Codigo de error: {{$data['consultarDocumentoResponse']['return']['strNumRespuesta']}}</p>
    @endif
</div>
