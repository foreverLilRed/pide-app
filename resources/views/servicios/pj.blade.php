@extends('layouts.plantilla2')

@section('title')
    <title>Consultas PODER JUDICIAL</title>
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
                    Consultas PODER JUDICIAL
                </p>
                <div class="mb-4 my-0">
                    <form class="row g-3" method="POST" action="{{ route('registro') }}">
                        @csrf
                        <input type="hidden" name="servicio" value="PJ">
                        <input type="text" name="apa" class="form-control" placeholder="Apellido Paterno" required>
                        <input type="text" name="ama" class="form-control" placeholder="Apellido Materno" required>
                        <input type="text" name="no1" class="form-control" placeholder="Primer Nombre" required>
                        <input type="text" name="no2" class="form-control" placeholder="Segundo Nombre" >
                        <input type="text" name="no3" class="form-control" placeholder="Tercer Nombre">
                        <input type="text" name="dni" class="form-control" placeholder="Ingrese DNI" pattern="[0-9]+" required maxlength="8">
                        <button type="submit" class="btn btn-success"><b>Buscar</b></button>
                        @if(isset($data))
                            <button type="button" class="btn btn-primary" onclick="imprimirTabla()"><b>Imprimir</b></button>
                        @endif 
                    </form>     
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8 d-flex justify-content-center align-items-center mt-3">
            @if (isset($data))
                @include('campos.pj-result')
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