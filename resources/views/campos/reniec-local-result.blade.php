<div id='tablas' class="w-100">
    @if($persona->resultado)
                <div class="container border border-black rounded p-4">
                    <div class="row">
                        <div class="col-12 col-lg-7 m-2">
                            <p class="text-start" style="text-align: center"><b>Primer Apellido: </b>{{ $persona->apa }}</p>
                            <p class="text-start"><b>Segundo Apellido: </b>{{ $persona->ama }}</p>
                            <p class="text-start"><b>Nombres: </b>{{ $persona->nombres }}</p>
                            <p class="text-start"><b>Estado Civil: </b>{{ $persona->estado }}</p>
                            <p class="text-start"><b>Dirección: </b>{{ $persona->direccion }}</p>
                            <p class="text-start"><b>Ubigeo: </b>{{ $persona->ubigeo }}</p>
                            <p class="text-start"><b>Resticción: </b>{{ $persona->restriccion }}</p>
                        </div>
                        <div class="col-12 col-lg-4 mt-2">
                                <img src="data:image/png;base64,{{ $persona->photo }}" class="rounded" alt="Foto de la persona">
                        </div>
                    </div>
                    <blockquote class="blockquote">
                        <p>Busqueda Local</p>
                    </blockquote>
                </div>
            @else
                <b>No hay datos para el documento</b>
            @endif
</div>
