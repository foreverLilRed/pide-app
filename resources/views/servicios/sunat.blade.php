@extends('layouts.plantilla2')

@section('title')
    <title>Consultas SUNAT</title>
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
                    Consultas SUNAT
                </p>
                <div class="mb-4 my-0">
                    <form class="row g-3" method="POST" action="{{ route('registro') }}">
                        @csrf
                        <input type="hidden" name="servicio" value="SUNAT">
                        <input type="text" name="ruc" class="form-control" placeholder="Ingrese RUC" maxlength="11" pattern="[0-9]+" required>
                        <button type="submit" class="btn btn-success"><b>Buscar</b></button>
                        @if(isset($data1) && isset($data1['list']['multiRef']['ddp_fecalt']['$']))
                            <button type="button" class="btn btn-primary" onclick="imprimirTabla()"><b>Imprimir</b></button>
                        @endif 
                    </form>     
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center mt-3">
            @if (isset($data1))
                @include('campos.sunat-result')
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
