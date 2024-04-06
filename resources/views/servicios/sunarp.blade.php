@extends('layouts.plantilla2')

@section('title')
    <title>Consultas SUNARP</title>
@section('contenido')
    <style>
        .ventana {
            display: none;
        }
    </style>

    <div class="container-fluid text-center row w-100">
        <div class="col-lg-4 mt-3">
            <div class="d-flex flex-column border border-black rounded p-4" style="text-align: center">
                <p class="fs-2 lead">
                    Consultas SUNARP
                </p>
                <div class="mb-4 my-0">
                    <div class="row g-3">
                        @csrf
                        <input type="hidden" name="servicio" value="SUNARP">
                        <select class="form-select" id="tip" name="tip" onchange="mostrarDiv()">
                            <option value="0" selected disabled>-- Seleccione una opcion --</option>
                            <option value="1" {{ isset($tip) && $tip == 1 ? 'selected' : '' }}>Consulta de Registro de Persona Juridica</option>
                            <option value="2" {{ isset($tip) && $tip == 2 ? 'selected' : '' }}>Consulta Titularidad de Bienes para Personas Naturales</option>
                            <option value="3" {{ isset($tip) && $tip == 3 ? 'selected' : '' }}>Consulta Titularidad de Bienes para Personas Juridica</option>
                            <option value="5" {{ isset($tip) && $tip == 5 ? 'selected' : '' }}>Ver Detalle de Registro de Propiedad Vehicular</option>
                            <option value="6" {{ isset($tip) && $tip == 6 ? 'selected' : '' }}>Listar Asientos SIRSARP</option>
                        </select>
                        <div id="ventana1" class="ventana row g-2" style="{{ isset($tip) && $tip == 1 ? 'display: block;' : 'display: none;' }}">
                            <form method="POST" action="{{ route('registro') }}">
                                @csrf
                                <input type="hidden" name="servicio" value="SUNARP">
                                <input type="hidden" name="tipo" value="1">
                                <div class="input-group mb-3 mt-3">
                                    <input type="text" name='ruc' class="form-control" placeholder="Ingrese Razon Social" aria-label="Recipient's username" aria-describedby="button-addon2"  required> 
                                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                                </div> 
                            </form>  
                        </div>

                        <div id="ventana2" class="ventana row g-2" style="{{ isset($tip) && $tip == 2 ? 'display: block;' : 'display: none;' }}">
                            <form method="POST" action="{{ route('registro') }}">
                                @csrf
                                <input type="hidden" name="servicio" value="SUNARP">
                                <input type="hidden" name="tipo" value="2">
                                <input type="text" name="apa" class="form-control mt-3" placeholder="Apellido Paterno" required>
                                <input type="text" name="ama" class="form-control mt-3" placeholder="Apellido Materno"  required>
                                <input type="text" name="nom" class="form-control mt-3" placeholder="Nombres" required>
                                <button class="btn btn-success w-100 mt-3" type="submit" id="button-addon2">Buscar</button>
                            </form>  
                        </div>
                        <div id="ventana3" class="ventana row g-2" style="{{ isset($tip) && $tip == 3 ? 'display: block;' : 'display: none;' }}">
                            <form method="POST" action="{{ route('registro') }}">
                                @csrf
                                <input type="hidden" name="servicio" value="SUNARP">
                                <input type="hidden" name="tipo" value="3">
                                <div class="input-group mb-3 mt-3">
                                    <input type="text" name='ruc' class="form-control" placeholder="Ingrese Razon Social" aria-label="Recipient's username" aria-describedby="button-addon2" required> 
                                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                                </div> 
                            </form>  
                        </div>
                        <div id="ventana5" class="ventana row g-2" style="{{ isset($tip) && $tip == 5 ? 'display: block;' : 'display: none;' }}">
                            <form method="POST" action="{{ route('registro') }}" class="mb-3">
                                @csrf
                                <input type="hidden" name="servicio" value="SUNARP">
                                <input type="hidden" name="tipo" value="5">
                            
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <select name="codZona" id="codZona" class="form-select" required>
                                            <option value="" selected disabled>Código de Zona</option>
                                            @foreach ($oficinasPorZona as $codigoZona => $oficinas)
                                                <option value="{{ $codigoZona }}">{{ $oficinas[0]['codZona'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <select name="codOficina" id="codOficina" class="form-select" required>
                                            <option value="" selected disabled>Código de Oficina</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="inputText" name="placa" placeholder="Ingrese Placa" pattern="^[^\s]+$" title="No se permiten espacios">
                                </div>
                            
                                <button class="btn btn-success w-100" type="submit" id="button-addon2">Buscar</button>
                            </form>         
                        </div>
                        <div id="ventana6" class="ventana row g-2" style="{{ isset($tip) && $tip == 6 ? 'display: block;' : 'display: none;' }}">
                            <form method="POST" action="{{ route('registro') }}" class="mb-3">
                                @csrf
                                <input type="hidden" name="servicio" value="SUNARP">
                                <input type="hidden" name="tipo" value="6">
                            
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <select name="codZona" id="codZona6" class="form-select" required>
                                            <option value="" selected disabled>Código de Zona</option>
                                            @foreach ($oficinasPorZona as $codigoZona => $oficinas)
                                                <option value="{{ $codigoZona }}">{{ $oficinas[0]['codZona'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            
                                    <div class="col-md-6 mb-3">
                                        <select name="codOficina" id="codOficina6" class="form-select" required>
                                            <option value="" selected disabled>Código de Oficina</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="partida" placeholder="Numero de Partida" pattern="[0-9]+" title="No se permiten espacios">
                                </div>

                                <div class="mb-3">
                                    <select class="form-select" id="level" name="registro">
                                        <option value="0" selected disabled>Numero de registro</option>
                                        <option value="21000" >Inmuebles</option>
                                        <option value="24000" >Muebles</option>
                                    </select>
                                </div>
                            
                                <button class="btn btn-success w-100" type="submit" id="button-addon2">Buscar</button>
                            </form>         
                        </div> 
                    </div>
                </div>     
            </div>
        </div>
        
        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center mt-3">
            @if (isset($data1))
                @include('campos.sunarp-result1')
            @elseif (isset($data2))
                @include('campos.sunarp-result2')
            @elseif (isset($data3))
                @include('campos.sunarp-result3')
            @elseif (isset($data4))
                @include('campos.sunarp-result4')
            @elseif (isset($data5))
                @include('campos.sunarp-result5')
            @elseif (isset($data6))
                @include('campos.sunarp-result6')
            @endif
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#codZona6').on('change', function () {
                var codZona = $(this).val();
                if (codZona) {
                    var oficinas = @json($oficinasPorZona);

                    var oficinasEnZona = oficinas[codZona];

                    $('#codOficina6').empty();
                    $.each(oficinasEnZona, function (index, oficina) {
                        $('#codOficina6').append('<option value="' + oficina.codOficina + '">' + oficina.descripcion + '</option>');
                    });
                } else {
                    $('#codOficina6').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#codZona').on('change', function () {
                var codZona = $(this).val();
                if (codZona) {
                    var oficinas = @json($oficinasPorZona);

                    var oficinasEnZona = oficinas[codZona];

                    $('#codOficina').empty();
                    $.each(oficinasEnZona, function (index, oficina) {
                        $('#codOficina').append('<option value="' + oficina.codOficina + '">' + oficina.descripcion + '</option>');
                    });
                } else {
                    $('#codOficina').empty();
                }
            });
        });
    </script>

    <script>
        function mostrarDiv() {
            var select = document.getElementById('tip');
            var selectedValue = select.options[select.selectedIndex].value;
            
            var divs = document.querySelectorAll('.ventana');
            divs.forEach(function(div) {
                div.style.display = 'none';
            });
    
            var divToShow = document.getElementById('ventana' + selectedValue);
            if (divToShow) {
                divToShow.style.display = 'block';
            }
        }


    </script>


    
@endsection