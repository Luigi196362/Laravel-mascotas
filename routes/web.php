<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\CitasController;

// Ruta para la página principal
Route::get('/', function () {
    return view('home');
})->name('home');

// Grupo de rutas para "Mascotas"
Route::prefix('mascotas')->name('mascotas.')->group(function () {
    Route::get('/', [MascotasController::class, 'index'])->name('index');
    Route::get('/create', [MascotasController::class, 'create'])->name('create'); // Formulario dinámico
    Route::post('/', [MascotasController::class, 'store'])->name('store'); // Guardar nueva mascota
    Route::delete('/mascotas/{mascota}', [MascotasController::class, 'destroy'])->name('destroy');// Ruta para eliminar una mascota
    Route::get('/edit/{mascota}', [MascotasController::class, 'edit'])->name('edit');// Ruta para eliminar una mascota
    Route::put('/mascotas/{mascota}', [MascotasController::class, 'update'])->name('update'); // Guardar nueva cita
   
});

// Grupo de rutas para "Servicios"
Route::prefix('servicios')->name('servicios.')->group(function () {
    Route::get('/', [ServiciosController::class, 'index'])->name('index');
    Route::get('/create', [ServiciosController::class, 'create'])->name('create'); // Formulario dinámico
    Route::post('/store', [ServiciosController::class, 'store'])->name('store'); // Guardar nuevo servicio
    Route::delete('/servicios/{servicio}', [ServiciosController::class, 'destroy'])->name('destroy');// Ruta para eliminar una mascota
    Route::get('/edit/{servicio}', [ServiciosController::class, 'edit'])->name('edit');// Ruta para eliminar una mascota
    Route::put('/servicios/{servicio}', [ServiciosController::class, 'update'])->name('update'); // Guardar nueva cita
   
});

// Grupo de rutas para "Citas"
Route::prefix('citas')->name('citas.')->group(function () {
    Route::get('/', [CitasController::class, 'index'])->name('index');
    Route::get('/create', [CitasController::class, 'create'])->name('create'); // Formulario dinámico
    Route::post('/store', [CitasController::class, 'store'])->name('store'); // Guardar nueva cita
    Route::delete('/citas/{cita}', [CitasController::class, 'destroy'])->name('destroy');// Ruta para eliminar una mascota
    Route::get('/edit/{cita}', [CitasController::class, 'edit'])->name('edit');// Ruta para eliminar una mascota
    Route::put('/citas/{cita}', [CitasController::class, 'update'])->name('update'); // Guardar nueva cita
   
});
