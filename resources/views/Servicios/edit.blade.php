@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container mt-5">
    <h2 class="text-center">Editar Servicio</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $servicio->nombre) }}" required>
                </div>


                <!-- Descripcion -->
                <div class="form-group mb-3">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', $servicio->descripcion) }}" required>
                </div>

                <!-- Precio -->
                <div class="form-group mb-3">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio', $servicio->precio) }}" required>
                </div>

                <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    <a href="{{ route('servicios.index') }}" class="cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
