<div class="row mb-4">
        @if ($data['Estado'] == 0)
            <h4>La persona no está inscrita en CONADIS</h4>
        @else
            <div id="tablas">
                <p><b>Nombre: </b>{{ $data['Nombre'] }}</p>
                <p><b>Apellido Paterno: </b>{{ $data['ApellidoPaterno'] }}</p>
                <p><b>Apellido Materno: </b>{{ $data['ApellidoMaterno'] }}</p>
                <p><b>Estado de CONADIS: </b>{{ $conadis_est }}</p>
                <p><b>Estado de vida: </b>{{ $conadis_vida }}</p>
                <p><b>Gravedad de discapacidad: </b>{{ $conadis_grav }}</p>
            </div>
        @endif
</div>