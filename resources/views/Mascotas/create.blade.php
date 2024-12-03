@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container">
        <h2>Agregar Mascota</h2>
        <form action="{{ route('mascotas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Mascota</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie">
            </div>
            <div class="form-group">
                <label for="raza">Raza</label>
                <input type="text" class="form-control" id="raza" name="raza">
            </div>
            <div class="form-group">
                <label for="edad">Edad (años)</label>
                <input type="number" class="form-control" id="edad" name="edad">
            </div>
            <div class="form-group">
                <label for="peso">Peso (Kg)</label>
                <input type="number" class="form-control" id="peso" step="0.01" name="peso">
            </div>
            <div class="form-group">
                <label for="dueño">Nombre del Dueño</label>
                <input type="text" class="form-control" id="dueño" name="dueño">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="url" class="form-control-url" id="imagen" name="imagen">
            </div>
            <div class="form-group">
                <label for="contacto">Número de Contacto</label>
                <input type="text" class="form-control" id="contacto" name="contacto">
            </div>
            <div class="botones">
                <button type="submit" class="btn btn-primary">Guardar mascota</button>

                <a href="{{ route('mascotas.index') }}" class="cancelar">Cancelar</a>
            </div>
        </form>
        
    </div>
@endsection
