@extends('layouts.plantilla2')

@section('title')
    <title>Bitácora de búsquedas</title>
@endsection

<head>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

@section('contenido')
    <style>
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
    <div class="container mt-4">
        <h2 class="my-4">Bitácora de Búsquedas</h2>
        <div class="d-flex justify-content-center align-items-center gap-3">
            <div class="p-2 flex-fill">
                <input type="text" id="buscar" class="form-control w-100" name="search" placeholder="Buscar por usuario o servicio" aria-label="Recipient's username" aria-describedby="button-addon2">
            </div>
            <div class="p-2">
                <input type="date" id="start" name="trip-start"  />
            </div>
            <div class="p-2">
                <button id="imprimirDatos" class="btn btn-primary">Imprimir</button>
            </div>
        </div>

        <table id="table" class="table" style="text-align: center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Servicio</th>
                    <th>Fecha y Hora</th>
                    <th>Busqueda</th>
                </tr>
            </thead>
            <tbody id="body">
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{$registro->id}}</td>
                        <td>{{$registro->usuario}}</td>
                        <td>{{$registro->servicio}}</td>
                        <td>{{$registro->created_at}}</td>
                        <td>{{$registro->descripcion}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            var fechaActual = new Date().toISOString().split('T')[0];

            $('#start').attr('max', fechaActual);
            $('#buscar').on('keyup', function () {
                var valorBusqueda = $(this).val();
        
                if (valorBusqueda.length > 1) {
                    buscarDatos(valorBusqueda);
                } else {
                    cargarTodosDatos();
                }
            });

            $('#start').on('change', function () {
                var fechaSeleccionada = $(this).val();

                if (fechaSeleccionada) {
                    buscarDatosPorFecha(fechaSeleccionada);
                } else {
                    cargarTodosDatos();
                }
            });

            $('#imprimirDatos').on('click', function () {
                imprimirDatos();
            });
        });

        function buscarDatos(valorBusqueda){
            $.ajax({
                url: '/datos/bitacora/' + valorBusqueda,
                type: 'GET',
                success: function (data) {
                    listaFiltradaDatos = data.datos;
                    mostrarDatosFiltrados(listaFiltradaDatos);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function mostrarDatosFiltrados(listaFiltradaDatos){
            var todosDatosContainer = $('#body');
            todosDatosContainer.empty();
        
            console.log(listaFiltradaDatos);
            listaFiltradaDatos.forEach(function (dato) {
                todosDatosContainer.append('<tr><td>'+dato.id+'</td><td>'+dato.usuario+'</td><td>'+dato.servicio+'</td><td>'+dato.created_at+'</td><td>'+dato.descripcion+'</td></tr>');
            });
        }

        function cargarTodosDatos() {
            $.ajax({
                url: '/data-bitacora',
                type: 'GET',
                success: function (data) {
                    listaDatos = data.datos;
                    mostrarTodos(listaDatos);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function mostrarTodos(listaDatos){
            var todosDatosContainer = $('#body');
            todosDatosContainer.empty();
        
            console.log(listaDatos);
            listaDatos.forEach(function (dato) {
                todosDatosContainer.append('<tr><td>'+dato.id+'</td><td>'+dato.usuario+'</td><td>'+dato.servicio+'</td><td>'+dato.created_at+'</td><td>'+dato.descripcion+'</td></tr>');
            });
        }

        function buscarDatosPorFecha(fechaSeleccionada) {
            $.ajax({
                url: '/datos/bitacora/fecha/' + fechaSeleccionada,
                type: 'GET',
                success: function (data) {
                    listaFiltradaDatos = data.datos;
                    mostrarDatosFiltrados(listaFiltradaDatos);
                },
                error: function (error) {
                    console.log(error);
                }
            });}

            function imprimirDatos() {

                var ventanaImpresion = window.open('', '_blank');

                ventanaImpresion.document.write('<html><head><title>Bitácora de Búsquedas</title></head><body>');
                ventanaImpresion.document.write('<h2>Bitácora de Búsquedas</h2>');
                ventanaImpresion.document.write(document.getElementById('table').outerHTML);
                ventanaImpresion.document.write('</body></html>');

                ventanaImpresion.document.close();
                ventanaImpresion.print();
                ventanaImpresion.close();
            }
    </script>
@endsection
