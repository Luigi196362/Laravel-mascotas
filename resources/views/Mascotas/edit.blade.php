@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container mt-5">
    <h2 class="text-center">Editar Mascota</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('mascotas.update', $mascota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $mascota->nombre) }}" required>
                </div>


                <!-- Especie -->
                <div class="form-group mb-3">
                    <label for="especie">Especie</label>
                    <input type="text" id="especie" name="especie" class="form-control" value="{{ old('especie', $mascota->especie) }}" required>
                </div>

                <!-- Raza -->
                <div class="form-group mb-3">
                    <label for="raza">Raza</label>
                    <input type="text" id="raza" name="raza" class="form-control" value="{{ old('raza', $mascota->raza) }}" required>
                </div>

                <!-- Edad -->
                <div class="form-group mb-3">
                    <label for="edad">Edad (años)</label>
                    <input type="number" id="edad" name="edad" class="form-control" value="{{ old('edad', $mascota->edad) }}" required>
                </div>

                <!-- Peso -->
                <div class="form-group mb-3">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" id="peso" name="peso" class="form-control" value="{{ old('peso', $mascota->peso) }}" required>
                </div>

                <!-- Dueño -->
                <div class="form-group mb-3">
                    <label for="dueño">Dueño</label>
                    <input type="text" id="dueño" name="dueño" class="form-control" value="{{ old('dueño', $mascota->dueño) }}" required>
                </div>
                <!-- Imagen -->
                <div class="form-group mb-3">
                    <label for="imagen">Imagen</label>
                    <input type="url" id="imagen" name="imagen" class="form-control" value="{{ old('imagen',$mascota->imagen)}}">
                    @if($mascota->imagen)
                        <img src="{{ asset($mascota->imagen) }}" alt="imagen" class="mt-2" style="width: 100px;">
                    @endif
                </div>

                <!-- Contacto -->
                <div class="form-group mb-3">
                    <label for="contacto">Contacto</label>
                    <input type="text" id="contacto" name="contacto" class="form-control" value="{{ old('contacto', $mascota->contacto) }}" required>
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    <a href="{{ route('mascotas.index') }}" class="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
