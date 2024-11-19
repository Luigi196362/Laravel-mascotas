@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container py-4">
    <h2 class="text-center mb-4">Editar Cita</h2>
    <form action="{{ route('citas.update', $cita->id) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="mascota_id" class="form-label">Mascota</label>
            <select name="mascota_id" id="mascota_id" class="form-select">
                @foreach($mascotas as $mascota)
                    <option value="{{ $mascota->id }}" {{ $cita->mascota_id == $mascota->id ? 'selected' : '' }}>
                        {{ $mascota->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="servicio_id" class="form-label">Servicio</label>
            <select name="servicio_id" id="servicio_id" class="form-select">
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" {{ $cita->servicio_id == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option value="pendiente" {{ $cita->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmada" {{ $cita->estado === 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelada" {{ $cita->estado === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="botones">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>

            <a href="{{ route('citas.index') }}" class="cancelar">Cancelar</a>
        </div>
    </form>
</div>
@endsection
