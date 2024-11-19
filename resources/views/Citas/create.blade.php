@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container">
        <h2>Agregar Cita</h2>
        <form action="{{ route('citas.store') }}" method="POST">
        @csrf    
        <div class="form-group">
                <label for="mascota_id">Seleccionar Mascota</label>
                <select class="form-control" id="mascota_id" name="mascota_id">
                @foreach ($mascotas as $mascota)
                    <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="servicio_id">Seleccionar Servicio</label>
                <select class="form-control" id="servicio_id" name="servicio_id">
                @foreach ($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="pendiente">Pendiente</option>
                    <option value="confirmada">Confirmada</option>
                    <option value="cancelada">Cancelada</option>
                </select>
            </div>
            
        <div class="botones">
            <button type="submit" class="btn btn-primary">Guardar cita</button>

            <a href="{{ route('citas.index') }}" class="cancelar">Cancelar</a>
        </div>
        </form>
    </div>
@endsection
