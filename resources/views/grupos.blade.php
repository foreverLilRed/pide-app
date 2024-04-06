@extends('layouts.plantilla2')


@section('title')
    <title>Grupos</title>
@endsection

@section('contenido')
<style>
    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-3px); }
        100% { transform: translateX(0); }
    }
    #grupoUsuariosContainer li:hover {
        background-color: #d74c4c;
        cursor: pointer;
        transform: scale(1.02);
        font-weight: bold;
        color: white;
        animation: shake 0.5s ease-out;
    }

    input[type="checkbox"] {
        border: 2px solid #007bff; 
        border-radius: 4px; 
        margin-right: 5px;
    }
    #datosContainer {
        display: none;
        animation: blurIn 0.4s ease-out; 
    }

    @keyframes blurIn {
        from {
            filter: blur(5px); 
            opacity: 0; 
        }
        to {
            filter: blur(0);
            opacity: 1; 
        }
    }

    .col-4 {
        display: flex;
        flex-direction: column;
        align-items: center; 
    }

    ul {
        list-style-type: none; 
        padding: 0; 
        margin: 0; 
        width: 100%;
    }

    ul li {
        transition: background-color 0.3s; 
    }

    #todosUsuariosContainer li:hover {
        background-color: #5ec454;
        transform: scale(1.02);
        font-weight: bold;
        color: white;
        animation: shake 0.5s ease-out;
    }


    ::placeholder {
            font-style: italic;
    }

    #grupoUsuariosContainer {
        max-height: 230px;
        overflow-x: hidden; 
    }

    #todosUsuariosContainer {
        max-height: 230px;
        overflow-x: hidden;
    }

    #grupoPermisosContainer {
        overflow-y: auto;
        max-height: 230px;
        overflow-x: hidden;  
    }

    .usuarioTodos:hover,
    .usuarioGrupo:hover {
        background-color: #f0f0f0;
        cursor: pointer;
        transform: scale(1.02);
        font-weight: bold;
    }

    .usuarioTodos:active,
    .usuarioGrupo:active {
        background-color: #e0e0e0;
        transform: scale(1);
    }
</style>

<div class="container">
      <div class=" col-md-12 m-auto">
        <h1>Grupos</h1>
        <div class="rounded border dark row p-3">
            <div class="col-2"></div>
            <div class="col-4">
                <div class="my-1 mx-1 w-100">
                    <select id="miSelect" class="form-select" aria-label="Default select example">
                        <option selected disabled>Lista de grupos</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>    
                        @endforeach
                      </select>
                  </div>
            </div>
            <div class="col-4">
                <div class="my-1 mx-1">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar grupo
                      </button>
                  </div>
            </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Grupo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formularioRegistro" action="{{ route('addgrupo') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <label class="form-label">Permisos</label><br>
                <div class="d-flex align-content-start flex-wrap">
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="sunat" value="sunat" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="sunat">SUNAT</label>
                    </div>
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="reniec" value="reniec" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="reniec">RENIEC</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="essalud" value="essalud" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="essalud">ESSALUD</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="minedu" value="minedu" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="minedu">MINEDU</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="conadis" value="conadis" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="conadis">CONADIS</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="mtc" value="mtc" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="mtc">MTC</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="inpe" value="inpe" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="inpe">INPE</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="pj" value="pj" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="pj">PODER JUDICIAL</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="pnp" value="pnp" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="pnp">PNP</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="minsa" value="minsa" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="minsa">MINSA</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="sunarp" value="sunarp" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="sunarp">SUNARP</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="sunedu" value="sunedu" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="sunedu">SUNEDU</label>
                    </div>
            
                    <div class="m-1">
                        <input type="checkbox" class="btn-check" id="migraciones" value="migraciones" name="permisos[]" autocomplete="off">
                        <label class="btn btn-outline-primary btn-sm" for="migraciones">MIGRACIONES</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
            <div class="col-2"></div>
        </div>
      </div>
  </div>
  <div class="bg-body container mt-4" id="datosContainer">
    <div class="row">
        <div class="border-end border-secondary col-9">
            <h3 style="text-align: center">Gestionar Miembros</h3>
            <div class="row mt-3">
                <div class="col-5">
                    <h4 style="text-align: center">Miembros de Grupo</h4>
                    <ul id="grupoUsuariosContainer" class="list-group list-group-flush" style="text-align: center">
                    </ul>
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    <img src="{{asset('imagenes/bidireccional.png')}}" width="50" height="50">
                </div>
                <div class="rounded col-5">
                    <h4 style="text-align: center">Usuarios disponibles</h4>
                    <div class="m-2">
                        <input type="text" class="form-control" id="buscarUsuario" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Buscar usuario">
                    </div>
                    <ul id="todosUsuariosContainer" class="list-group list-group-flush" style="text-align: center"></ul>
                </div>
            </div>
        </div>
        <div class="col-3">
            <h3 style="text-align: center">Permisos</h3>
            <div class="container text-center">
                <ul id="grupoPermisosContainer" class="form-check">
                <li><input class="form-check-input" type="checkbox" id="'+permiso.servicio+'" value="'+permiso.servicio+'" name="permisos_data[]" autocomplete="off"><label class="form-check-label" for="'+permiso.servicio+'"><p><strong>'+permiso.servicio+'</strong></p></label></li>
                </ul> 
                <form id="ActualizacionGrupo" action="{{ route('editar-grupo') }}" method="POST">
                    @csrf
                    <input type="hidden" id="valorSeleccionadoInput" name="valorSeleccionado">
                    <input type="hidden" id="miembrosSeleccionados" name="miembrosSeleccionados" value="">
                    <input type="hidden" id="permisosSeleccionados" name="permisosSeleccionados" value="">
                    <button type="submit" id="btnGuardarDatos" class="btn btn-dark mt-4"><strong>Guardar datos</strong></button>
                </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    var listaCompletaUsuarios;
    var listaMiembros = [];
    var valorSeleccionado;

    $(document).ready(function () {

        $('#miSelect').on('change', function () {
            valorSeleccionado = $(this).val();

            if (valorSeleccionado === 'default-option') {
            } else {
                console.log("Grupo seleccionado: " + valorSeleccionado);
            }
        });
    });

    $(document).ready(function () {

        $('#btnGuardarDatos').on('click', function () {
            var permisosSeleccionados = $('input[name="permisos_data[]"]:checked').map(function () {
                return $(this).val();
            }).get();

            var miembrosSeleccionados = $('ul#grupoUsuariosContainer li').map(function () {
                return $(this).data('id');
            }).get();

            $('#permisosSeleccionados').val(JSON.stringify(permisosSeleccionados));
            $('#miembrosSeleccionados').val(JSON.stringify(miembrosSeleccionados));
            $('#valorSeleccionadoInput').val(valorSeleccionado);
        });
    });


    $(document).ready(function () {
        $('#miSelect').on('change', function () {
            $('#datosContainer').show();

        });

    });
    const servicios = [
        { nombre: 'Sunat', valor: 'sunat' },
        { nombre: 'Essalud', valor: 'essalud' },
        { nombre: 'Poder Judicial', valor: 'pj' },
        { nombre: 'Migraciones', valor: 'migraciones' },
        { nombre: 'Sunarp', valor: 'sunarp' },
        { nombre: 'Sunedu', valor: 'sunedu' },
        { nombre: 'Inpe', valor: 'inpe' },
        { nombre: 'PNP', valor: 'pnp' },
        { nombre: 'Conadis', valor: 'conadis' },
        { nombre: 'Reniec', valor: 'reniec' },
        { nombre: 'Minsa', valor: 'minsa' },
        { nombre: 'MTC', valor: 'mtc' },
        { nombre: 'Minedu', valor: 'minedu' },
    ];

    cargarTodosUsuarios();

    function cargarTodosUsuarios() {
        $.ajax({
            url: '/todos-usuarios',
            type: 'GET',
            success: function (data) {
                listaCompletaUsuarios = data.todosUsuarios;
                mostrarTodosUsuarios(listaCompletaUsuarios);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    $(document).ready(function () {

        $('#buscarUsuario').on('keyup', function () {
            var valorBusqueda = $(this).val();
    
            if (valorBusqueda.length > 0) {
                buscarUsuarios(valorBusqueda);
            } else {
                cargarDatosActualizados();
            }
        });
    

        //Muestra los datos al cambiar el select de los Grupos
        $('#miSelect').on('change', function () {
            var valorSeleccionado = $(this).val();
    
            $.ajax({
                url: '/datos-grupo/' + valorSeleccionado,
                type: 'GET',
                success: function (data) {
                    listaMiembros = data.usuarios;
                    mostrarDatosEnContainer(data);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    
        //Une los datos del Grupo al html
        function mostrarDatosEnContainer(data) {
            var container = $('#grupoUsuariosContainer');
            var permisos = $('#grupoPermisosContainer');
            container.empty();
            permisos.empty();
    
            if (data.error) {
                container.append('<p>Error: ' + data.error + '</p>');
                permisos.append('<p>Error: ' + data.error + '</p>');
            } else {
                data.usuarios.forEach(function (usuario) {
                    container.append('<li onclick="moverAUsuarios(' + usuario.id + ')" class="usuarioTodos list-group-item" data-id="' + usuario.id + '">' + usuario.name + '</li>');
                });

                servicios.forEach(function (servicio) {

                    var liElement = $('<li>');
                    var checkbox = $('<input>', {
                        class: 'form-check-input',
                        type: 'checkbox',
                        id: servicio.valor,
                        value: servicio.valor,
                        name: 'permisos_data[]',
                        autocomplete: 'off'
                    });
                    var label = $('<label>', {
                        class: 'form-check-label',
                        for: servicio.valor
                    }).append('<p><strong>' + servicio.nombre + '</strong></p>');

                    if (data.permisos.some(permiso => permiso.servicio === servicio.valor)) {
                        checkbox.prop('checked', true);
                    }

                    liElement.append(checkbox);
                    liElement.append(label);

                    permisos.append(liElement);
                });

                /*
                data.permisos.forEach(function (permiso) {
                    permisos.append('<li><input class="form-check-input" type="checkbox" id="'+permiso.servicio+'" value="'+permiso.servicio+'" name="permisos_data[]" autocomplete="off"><label class="form-check-label" for="'+permiso.servicio+'"><p><strong>'+permiso.servicio+'</strong></p></label></li>');
                });

                console.log(data.permisos);
                */
            }
        }
    
    
    });
    
    function cargarDatosActualizados(){
        var todosUsuariosContainer = $('#todosUsuariosContainer');
        todosUsuariosContainer.empty();
    
        listaCompletaUsuarios.forEach(function (usuario) {
            todosUsuariosContainer.append('<li onclick="moverAMiembro(' + usuario.id + ')" class="usuarioTodos list-group-item" data-id="' + usuario.id + '">' + usuario.name + '</li>');
        });
    }

    function mostrarTodosUsuarios(data) {
        var todosUsuariosContainer = $('#todosUsuariosContainer');
        todosUsuariosContainer.empty();
    
        listaCompletaUsuarios.forEach(function (usuario) {
            todosUsuariosContainer.append('<li onclick="moverAMiembro(' + usuario.id + ')" class="usuarioTodos list-group-item" data-id="' + usuario.id + '">' + usuario.name + '</li>');
        });
    
    }
    
    //Busqueda
    function buscarUsuarios(valorBusqueda) {
        var usuariosEncontrados = listaCompletaUsuarios.filter(usuario => usuario.name.toLowerCase().includes(valorBusqueda.toLowerCase()));
        mostrarUsuariosFiltrados(usuariosEncontrados);
    }
    
    function mostrarUsuariosFiltrados(usuariosEncontrados) {
        var todosUsuariosContainer = $('#todosUsuariosContainer');
        todosUsuariosContainer.empty();
    
        if (usuariosEncontrados.length > 0) {

            usuariosEncontrados.forEach(function(usuario) {
                todosUsuariosContainer.append('<li onclick="moverAMiembro(' + usuario.id + ')" class="usuarioTodos list-group-item" data-id="' + usuario.id + '">' + usuario.name + '</li>');
            });

        } else {
            todosUsuariosContainer.append('<p>No se encontraron Usuarios.</p>');
        }
    }

    function moverAMiembro(id) {
        const index = listaCompletaUsuarios.findIndex((usuario) => usuario.id === id);

        if (index !== -1) {
            const miembro = listaCompletaUsuarios[index];
            listaMiembros.push(miembro);
            listaCompletaUsuarios.splice(index, 1);

            mostrarTodosUsuarios(listaCompletaUsuarios);
            cargarMiembros(listaMiembros);
        } else {
            console.log('Usuario no encontrado en listaCompletaUsuarios');
        }

    }



    function cargarMiembros(listaMiembros) {
        var listaMiembrosContainer = $('#grupoUsuariosContainer');
        listaMiembrosContainer.empty();

        if (listaMiembros.length > 0) {

            listaMiembros.forEach(function(usuario) {
                listaMiembrosContainer.append('<li onclick="moverAUsuarios(' + usuario.id + ')" class="usuarioTodos list-group-item" data-id="' + usuario.id + '">' + usuario.name + '</li>');
            });

        } else {
            listaMiembrosContainer.append('<p>No se encontraron Usuarios.</p>');
        }

    }

    function moverAUsuarios(id) {

        const index = listaMiembros.findIndex((miembro) => miembro.id === id);

        if (index !== -1) {

            const usuario = listaMiembros[index];
            listaCompletaUsuarios.push(usuario);

            listaMiembros.splice(index, 1);

            mostrarTodosUsuarios(listaCompletaUsuarios);
            cargarMiembros(listaMiembros);
        } else {
            console.log('Miembro no encontrado en listaMiembros');
        }
    }

    function eliminar(){
        alert('Eliminar');
        $.ajax({
            url: '/eliminar-grupo/' + valorSeleccionado,
            type: 'DELETE',
            data: {
                    "_token": "{{ csrf_token() }}",
                    "id": valorSeleccionado
                    },
            error: function (error) {
                console.log(error);
            }
        });
        window.location.reload()
    }

    </script>
@endsection