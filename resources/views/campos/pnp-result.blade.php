<div id="tablas" class="card w-100">
    <div class="card-body">
        @foreach ($data as $dato)
                @if($dato['RespuestaPersona']['codigoMensaje']=='00')
                    <div class="container">
                        <div class="row">
                            <div class="col-6 mx-2">
                                <p class="text-lg-start"><b>Nombre completo: </b>{{$dato['RespuestaPersona']['nombrecompleto']}}</p>
                                <p class="text-lg-start"><b>Apellido Paterno: </b>{{$dato['RespuestaPersona']['apellidoPaterno']}}</p>
                                <p class="text-lg-start"><b>Apellido Materno: </b>{{$dato['RespuestaPersona']['apellidoMaterno']}}</p>
                                <p class="text-lg-start"><b>Nombres: </b>{{$dato['RespuestaPersona']['nombres']}}</p>
                                <p class="text-lg-start"><b>Codigo Persona: </b>{{$dato['RespuestaPersona']['codigoPersona']}}</p>
                                <p class="text-lg-start"><b>Doble Identidad: </b>{{$dato['RespuestaPersona']['dobleIdentidad']}}</p>
                                <p class="text-lg-start"><b>Homonimia: </b>{{$dato['RespuestaPersona']['homonimia']}}</p>
                                <p class="text-lg-start"><b>Lugar Nacimiento: </b>{{$dato['RespuestaPersona']['lugarNacimiento']}}</p>
                                <p class="text-lg-start"><b>Fecha Nacimiento: </b>{{$dato['RespuestaPersona']['fechaNacimiento']}}</p>
                            </div>
                            <div class="col-6 mx-2">
                                <p class="text-lg-start"><b>Nombre Padre: </b>{{$dato['RespuestaPersona']['nombrePadre']}}</p>
                                <p class="text-lg-start"><b>Nombre Madre: </b>{{$dato['RespuestaPersona']['nombreMadre']}}</p>
                                <p class="text-lg-start"><b>Tipo Documento: </b>{{$dato['RespuestaPersona']['tipoDocumento']}}</p>
                                <p class="text-lg-start"><b>Nro Documento: </b>{{$dato['RespuestaPersona']['nroDocumento']}}</p>
                                <p class="text-lg-start"><b>Sexo: </b>{{$dato['RespuestaPersona']['sexo']}}</p>
                                <p class="text-lg-start"><b>Talla: </b>{{$dato['RespuestaPersona']['talla']}}</p>
                                <p class="text-lg-start"><b>Contextura: </b>{{$dato['RespuestaPersona']['contextura']}}</p>
                                <p class="text-lg-start"><b>Codigo Mensaje: </b>{{$dato['RespuestaPersona']['codigoMensaje']}}</p>
                                <p class="text-lg-start"><b>Descripcion Mensaje: </b>{{$dato['RespuestaPersona']['descripcionMensaje']}}</p>
                            </div>
                        </div>
                    </div> 
                @else
                    <h5 class="card-title">Codigo Mensaje:</h5>
                    <p>{{$dato['RespuestaPersona']['codigoMensaje']}}</p>
                    <h5 class="card-title">Descripcion Mensaje:</h5>
                    <p>{{$dato['RespuestaPersona']['descripcionMensaje']}}</p>
                @endif
        @endforeach
    </div>
</div>