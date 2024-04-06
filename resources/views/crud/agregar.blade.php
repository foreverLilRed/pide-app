@extends('layouts.plantilla2')

@section('title')
    <title>Agregar Usuario</title>
@endsection

@section('contenido')
<h1 style="text-align: center">Agregar Usuario</h1>


<form action="{{ route('crear') }}" method="POST" style="max-width: 60%" class="mx-auto">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Login</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div class="mb-3">
        <label for="dni" class="form-label">DNI</label>
        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Estado</label>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" value="Activo" checked>
            <label class="form-check-label">Activo</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="estado" value="Inactivo">
            <label class="form-check-label">Inactivo</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="nivel" class="form-label">Nivel</label>
        <select class="form-select" id="nivel" name="nivel">
            <option value="1" {{ old('nivel') == 1 ? 'selected' : '' }}>Nivel 1</option>
            <option value="2" {{ old('nivel') == 2 ? 'selected' : '' }}>Nivel 2</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Agregar Usuario</button>
</form>
@endsection
