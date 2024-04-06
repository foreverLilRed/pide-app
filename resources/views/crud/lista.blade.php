@extends('layouts.plantilla2')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    <title>Resultado de Consulta</title>
@endsection

<head>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
@section('contenido')
<div class="container text-center">
    <div class="row align-items-start ">
      <div class="col-8">
        <h1 style="text-align: left">Listado de Usuarios</h1>
      </div>
      <div class="col-4 ">
        <div class="d-flex flex-row mb-3">
                <input type="text" class="form-control mx-2" id="buscar" name="buscar" placeholder="Buscar usuario">
            <a href="{{route('agregar')}}"><button type="button" class="btn btn-success mx-2"><img src="{{asset('imagenes/agregar.png')}}"  width="26" height="26"></button></a>
        </div>
      </div>
    </div>
  </div>


@if (count($users) > 0)
    <table class="table table-hover mx-auto" style="text-align: center; max-width: 80%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nivel de Acceso</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="body">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('editar', $user->id) }}" class="btn btn-primary mx-2">Editar</a>
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@else
    <p>No hay usuarios registrados.</p>
@endif
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
<script>
    $(document).ready(function () {
        $('#buscar').on('keyup', function () {
            var valorBusqueda = $(this).val();
    
            if (valorBusqueda.length > 1) {
                buscarUsuarios(valorBusqueda);
            } else {
                cargarTodosUsuarios();
            }
        });
    });

    function buscarUsuarios(valorBusqueda){
        $.ajax({
            url: '/usuarios/buscar/' + valorBusqueda,
            type: 'GET',
            success: function (data) {
                listaCompletaUsuarios = data.users;
                mostrarTodosUsuarios(listaCompletaUsuarios);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }


    function cargarTodosUsuarios() {
        $.ajax({
            url: '/data-users',
            type: 'GET',
            success: function (data) {
                listaCompletaUsuarios = data.todosUsuarios;
                mostrarTodos(listaCompletaUsuarios);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function mostrarTodosUsuarios(listaCompletaUsuarios){
        var todosUsuariosContainer = $('#body');
        todosUsuariosContainer.empty();
    
        console.log(listaCompletaUsuarios);
        listaCompletaUsuarios.forEach(function (usuario) {
            todosUsuariosContainer.append('<tr><td>'+usuario.id+'</td><td>'+usuario.name+'</td><td>'+usuario.level+'</td><td>'+usuario.email+'</td><td><a href="/usuarios/editar/' + usuario.id + '" class="btn btn-primary mx-2">Editar</tr>');
        });
    }

    function mostrarTodos(listaCompletaUsuarios){
        var todosUsuariosContainer = $('#body');
        todosUsuariosContainer.empty();
    
        console.log(listaCompletaUsuarios);
        listaCompletaUsuarios.forEach(function (usuario) {
            todosUsuariosContainer.append('<tr><td>'+usuario.id+'</td><td>'+usuario.name+'</td><td>'+usuario.level+'</td><td>'+usuario.email+'</td><td><a href="/usuarios/editar/' + usuario.id + '" class="btn btn-primary mx-2">Editar</a></tr></tr></tr></tr>');
        });
    }

</script>

