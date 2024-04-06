@extends('layouts.plantilla2')

@section('title')
    <title>Consultas MTC</title>
@section('contenido')
    <script>
        function imprimirTabla() {
            var printContents = document.getElementById('tablas').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    <div class="container-fluid text-center row w-100">
        <div class="col-lg-4 mt-3">
            <div class="d-flex flex-column border border-black rounded p-4" style="text-align: center">
                <p class="fs-2 lead">
                    Consultas MTC
                </p>
                <div class="mb-4 my-0">
                    <form class="row g-3" method="POST" action="{{ route('registro') }}">
                        @csrf
                        <input type="hidden" name="servicio" value="MTC">
                        <input type="text" name="doc" class="form-control" placeholder="Ingrese Documento" pattern="^[^\s]+$" required maxlength="20">
                        <select class="form-select" id="tip" name="tip">
                            <option value="1">RUC</option>
                            <option value="2" >DNI</option>
                            <option value="4" >Carnet de Extranjeria</option>
                            <option value="5" >Carnet Solicitante</option>
                            <option value="6" >Pasaporte</option>
                            <option value="13">Tarjeta de identidad</option>
                            <option value="14">Permiso temporal de Permanencia</option>
                        </select>
                        <button type="submit" class="btn btn-success"><b>Buscar</b></button>
                        @if(isset($data) && isset($data['GetDatosLicenciaMTCResponse']['GetDatosLicenciaMTCResult']['Licencia']['NroLicencia']))
                            <button type="button" class="btn btn-primary" onclick="imprimirTabla()"><b>Imprimir</b></button>
                        @endif 
                    </form>     
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center mt-3">
            @if (isset($data))
                @include('campos.mtc-result')
            @else
                <div class="text-center">
                    <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>      

@endsection