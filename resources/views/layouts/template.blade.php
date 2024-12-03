<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('template.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
    <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : 'deactive' }}">Home</a>
        <a href="{{ route('citas.index') }}" class="{{ Route::is('citas.*') ? 'active' : 'deactive' }}">Citas</a>
        <a href="{{ route('mascotas.index') }}" class="{{ Route::is('mascotas.*') ? 'active' : 'deactive' }}">Mascotas</a>
        <a href="{{ route('servicios.index') }}" class="{{ Route::is('servicios.*') ? 'active' : 'deactive' }}">Servicios</a>
        <a href="{{ route('productos.index') }}" class="{{ Route::is('productos.*') ? 'active' : 'deactive' }}">Productos</a>
    </nav>
    <div class="contenido">
    @yield ('content') @section('content')
    </div>
</body>
</html>