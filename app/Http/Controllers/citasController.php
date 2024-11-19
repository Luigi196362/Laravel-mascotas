<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Mascota;
use App\Models\Servicio;

class citasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Cita::with(['mascota', 'servicio'])->get();
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las mascotas y servicios
        $mascotas = Mascota::all(); // Recupera todas las mascotas
        $servicios = Servicio::all(); // Recupera todos los servicios

        // Pasar las mascotas y servicios a la vista
        return view('Citas.create', compact('mascotas', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'servicio_id' => 'required|integer|exists:servicios,id',
            'mascota_id' => 'required|integer|exists:mascotas,id',
            'estado' => 'required|string|max:255',
        ]);

        // Crear una nueva cita con los datos validados
        Cita::create([
            'servicio_id' => $validated['servicio_id'],
            'mascota_id' => $validated['mascota_id'],
            'estado' => $validated['estado'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar una cita específica (puedes implementar esto si lo necesitas)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cita = Cita::with(['mascota', 'servicio'])->findOrFail($id);
        $mascotas = Mascota::all();
        $servicios = Servicio::all();
    
        return view('citas.edit', compact('cita', 'mascotas', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'servicio_id' => 'required|integer|exists:servicios,id',
            'mascota_id' => 'required|integer|exists:mascotas,id',
            'estado' => 'required|string|max:255',
        ]);
    
        // Buscar la cita por su ID
        $cita = Cita::findOrFail($id);
    
        // Actualizar la cita con los datos validados
        $cita->update([
            'servicio_id' => $validated['servicio_id'],
            'mascota_id' => $validated['mascota_id'],
            'estado' => $validated['estado'],
        ]);
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita editada correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar una cita específica (puedes implementar esto si lo necesitas)
        $cita = Cita::findOrFail($id);
        $cita->delete();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('citas.index')->with('success', 'Cita eliminada con éxito');
        
    }
}
