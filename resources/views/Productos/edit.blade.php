@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('formularios.css') }}">
<div class="container mt-5">
    <h2 class="text-center">Editar producto</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="form-group mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
                </div>


                <!-- Descripcion -->
                <div class="form-group mb-3">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', $producto->descripcion) }}" required>
                </div>

                <!-- Precio -->
                <div class="form-group mb-3">
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" required>
                </div>

                <!-- Cantidad -->
                <div class="form-group mb-3">
                    <label for="cantidad">Cantidad</label>
                    <input type="text" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $producto->cantidad) }}" required>
                </div>

                <div class="form-group mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <select class="form-select" id="categoria" name="categoria">
                <option value="Alimentos" {{ $producto->categoria === 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                <option value="Juguetes" {{ $producto->categoria === 'Juguetes' ? 'selected' : '' }}>Juguetes</option>
                <option value="Accesorios" {{ $producto->categoria === 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
            </select>
        </div>


                <div class="botones">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    <a href="{{ route('productos.index') }}" class="cancelar">Cancelar</a>
                </div>

                

            </form>
        </div>
    </div>
</div>
@endsection
