@extends('layouts.plantilla2')

@section('title')
    <title>Editar Usuario</title>
@endsection

@section('contenido')
<h1 style="text-align: center">Editar Usuario</h1>

<style>
    #contenedor{
        position: relative;
    }

    #eliminar{
        position: absolute;
        left: 90%;
        top: 93%;
    }
</style>
<div id="contenedor" class="container">
    <form id="eliminar" class="mx-2" action="{{ route('eliminar', $user->id) }}" id="editar" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Esta seguro de borrar este usuario?')">Eliminar</button>
    </form>
    <form action="{{ route('update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Login</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ $user->dni }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" value="Activo"
                    {{ $user->estado === 'Activo' ? 'checked' : '' }}>
                <label class="form-check-label">Activo</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="estado" value="Inactivo"
                    {{ $user->estado === 'Inactivo' ? 'checked' : '' }}>
                <label class="form-check-label">Inactivo</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="nivel" class="form-label">Cambiar Grupo</label>
            <select class="form-select" id="grupo" name="grupo">
                <option value="">Sin grupo</option>
                @foreach ($grupos as $grupo)
                    <option value={{$grupo->id}} {{ $grupo->id == $user->group_id ? 'selected' : '' }}>{{$grupo->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Nivel</label>
            <select class="form-select" id="level" name="level">
                <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Nivel 1</option>
                <option value="2" {{ $user->level == 2 ? 'selected' : '' }}>Nivel 2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
