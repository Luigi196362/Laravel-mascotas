@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container">
        <h2>Agregar Servicio</h2>
        <form action="{{ route('servicios.store') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Servicio</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio">
            </div>
            
            <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar servicio</button>

                    <a href="{{ route('servicios.index') }}" class="cancelar">Cancelar</a>
                </div>
        </form>
    </div>
@endsection
