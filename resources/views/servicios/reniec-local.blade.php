@extends('layouts.plantilla2')

@section('title')
    <title>Consultas RENIEC</title>
@endsection

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

    <div class="container-fluid text-center row">
        <div class="col-lg-4 mt-3">
            <div class="d-flex flex-column border border-black rounded p-4" style="text-align: center">
                <p class="fs-2 lead">
                    Consultas RENIEC
                </p>
                <div class="mb-4 my-0">
                    <form class="row g-3" method="POST" action="{{ route('registro') }}">
                        @csrf
                        <input type="hidden" name="servicio" value="RENIEC">
                        <input type="text" name="dni" class="form-control" placeholder="Ingrese DNI" maxlength="8" pattern="[0-9]+" required>
                        <button type="submit" class="btn btn-success"><b>Buscar</b></button>
                        <button type="button" class="btn btn-primary" onclick="imprimirTabla()"><b>Imprimir</b></button>
                    </form>     
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center mt-3">
            @include('campos.reniec-local-result')
        </div>
    </div>
@endsection
