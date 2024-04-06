<div id='tablas' class="w-100">
    @foreach ($data as $dato)
        @switch($dato['return']['coResultado'])
            @case('0000')
                <div class="container border border-black rounded p-4">
                    <div class="row">
                        <div class="col-12 col-lg-7 m-2">
                            <p class="text-start" style="text-align: center"><b>Primer Apellido: </b>{{ $dato['return']['datosPersona']['apPrimer'] }}</p>
                            <p class="text-start"><b>Segundo Apellido: </b>{{ $dato['return']['datosPersona']['apSegundo'] }}</p>
                            <p class="text-start"><b>Nombres: </b>{{ $dato['return']['datosPersona']['prenombres'] }}</p>
                            <p class="text-start"><b>Estado Civil: </b>{{ $dato['return']['datosPersona']['estadoCivil'] }}</p>
                            <p class="text-start"><b>Dirección: </b>{{ $dato['return']['datosPersona']['direccion'] }}</p>
                            <p class="text-start"><b>Ubigeo: </b>{{ $dato['return']['datosPersona']['ubigeo'] }}</p>
                            <p class="text-start"><b>Resticción: </b>{{ $dato['return']['datosPersona']['restriccion'] }}</p>
                        </div>
                        <div class="col-12 col-lg-4 mt-2">
                            @if (isset($dato['return']['datosPersona']['foto']))
                                <img src="data:image/png;base64,{{ $dato['return']['datosPersona']['foto'] }}" class="rounded" alt="Foto de la persona">
                            @endif
                        </div>
                    </div>
                    <blockquote class="blockquote">
                        <p>Busqueda Externa</p>
                    </blockquote>
                </div>
            @break
            @default
                <b>No hay datos para el documento</b>
            @break
        @endswitch
    @endforeach
</div>
