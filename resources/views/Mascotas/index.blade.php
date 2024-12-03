@extends('layouts.template')

@section('content')
<link rel="stylesheet" href="{{ asset('tablas.css') }}">
<div class="añadir_icono">
    <a href="{{ route('mascotas.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg>
    </a>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Peso</th>
                <th>Dueño</th>
                <th>Contacto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($mascotas as $mascota) <!-- Recorre cada mascota -->
                <tr>
                    <td>{{ $mascota->nombre }}</td>
                    <td><img src="{{ $mascota->imagen }}" alt="imagen" style="width: 100px;"></td>
                    <td>{{ $mascota->especie }}</td>
                    <td>{{ $mascota->raza }}</td>
                    <td>{{ $mascota->edad }} años</td>
                    <td>{{ $mascota->peso }} kg</td>
                    <td>{{ $mascota->dueño }}</td>
                    <td>{{ $mascota->contacto }}</td>
                        <!-- Formulario de eliminación -->
                        <td>
                        <form action="{{ route('mascotas.destroy', $mascota->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta mascota?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="trash" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('mascotas.edit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                    </svg>
                                </button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection