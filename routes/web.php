<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ProductosController;
// Ruta para la página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Grupo de rutas para "Mascotas"
Route::prefix('mascotas')->name('mascotas.')->group(function () {
    Route::get('/', [MascotasController::class, 'index'])->name('index');
    Route::get('/create', [MascotasController::class, 'create'])->name('create'); 
    Route::post('/', [MascotasController::class, 'store'])->name('store'); 
    Route::delete('/mascotas/{mascota}', [MascotasController::class, 'destroy'])->name('destroy');
    Route::post('/edit', [MascotasController::class, 'edit'])->name('edit');
    Route::put('/mascotas/{mascota}', [MascotasController::class, 'update'])->name('update');
   
});

// Grupo de rutas para "Servicios"
Route::prefix('servicios')->name('servicios.')->group(function () {
    Route::get('/', [ServiciosController::class, 'index'])->name('index');
    Route::get('/create', [ServiciosController::class, 'create'])->name('create'); 
    Route::post('/store', [ServiciosController::class, 'store'])->name('store'); 
    Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('destroy');
    Route::post('/edit', [ServiciosController::class, 'edit'])->name('edit');
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('update');
   
});

// Grupo de rutas para "Citas"
Route::prefix('citas')->name('citas.')->group(function () {
    Route::get('/', [CitasController::class, 'index'])->name('index');
    Route::get('/create', [CitasController::class, 'create'])->name('create');
    Route::post('/store', [CitasController::class, 'store'])->name('store'); 
    Route::delete('/citas/{cita}', [CitasController::class, 'destroy'])->name('destroy');
    Route::post('/edit', [CitasController::class, 'edit'])->name('edit');
    Route::put('/citas/{cita}', [CitasController::class, 'update'])->name('update'); 
   
});

Route::prefix('productos')->name('productos.')->group(function () {
    Route::get('/', [ProductosController::class, 'index'])->name('index');
    Route::get('/create', [ProductosController::class, 'create'])->name('create');
    Route::post('/store', [ProductosController::class, 'store'])->name('store'); 
    Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('destroy');
    Route::post('/edit', [ProductosController::class, 'edit'])->name('edit');
    Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('update');
   
});

