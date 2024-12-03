@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container">
        <h2>Agregar Producto</h2>
        <form action="{{ route('productos.store') }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio"  step="0.001" name="precio">
            </div>
            
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad"  name="cantidad">
            </div>
            
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="Alimentos">Alimentos</option>
                    <option value="Juguetes">Juguetes</option>
                    <option value="Accesorios">Accesorios</option>
                </select>
            </div>
            
            <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar producto</button>

                    <a href="{{ route('productos.index') }}" class="cancelar">Cancelar</a>
                </div>
        </form>
    </div>
@endsection
