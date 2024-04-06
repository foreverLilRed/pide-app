
@extends('layouts.plantilla2')

@section('title')
    <title>Inicio</title>
@endsection

@section('contenido')
	<style>
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            z-index: -1;
            border-radius: 10px;
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            @foreach($permisos as $permiso)
                <div class="col-lg-2 col-md-4 col-sm-6 col-12 mt-3">
                    <a href="{{ route($permiso->servicio) }}" style="text-decoration:none">
                        <div class="card mx-auto" style="width: 12rem;">
                            <img src="{{ asset('imagenes/' . $permiso->servicio . '.png') }}" class="card-img-top" alt="...">
                            <div class="card-body" style="text-align: center">
                                <h5 style="text-transform: uppercase;">{{ $permiso->servicio == 'pj' ? 'PODER JUDICIAL' : $permiso->servicio }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
