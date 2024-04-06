@extends('layouts.plantilla2')

@section('title')
    <title>Consultas SUNEDU</title>
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
        <div class="col-4">
            <div class="d-flex flex-column border border-black rounded p-4" style="text-align: center">
                <p class="fs-2 lead">
                    Consultas SUNEDU
                </p>
                <div class="mb-4 my-0">
                    <form class="row g-3" method="POST" action="{{ route('registro') }}">
                        @csrf
                        <input type="hidden" name="servicio" value="SUNEDU">
                        <input type="text" name="doc" class="form-control" placeholder="Ingrese Documento" pattern="[0-9]+" required maxlength="20">
                        <button type="submit" class="btn btn-success"><b>Buscar</b></button>
                        @if(isset($data))
                            <button type="button" class="btn btn-primary" onclick="imprimirTabla()"><b>Imprimir</b></button>
                        @endif 
                    </form>     
                </div>
            </div>
        </div>
        <div class="col-8 d-flex justify-content-center align-items-center">
            @if (isset($data))
                @include('campos.sunedu-result')
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