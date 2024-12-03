<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;  // Importa el modelo Mascota

class mascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Obtener todas las mascotas de la base de datos
        $mascotas = Mascota::all(); // Recupera todas las mascotas

        // Pasar las mascotas a la vista
        return view('mascotas.index', compact('mascotas')); // 'mascotas' es el nombre de la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mascotas.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

         // Validación de los datos del formulario
         $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'required|string|max:255',
            'edad' => 'required|integer|min:1',
            'peso' => 'required|numeric|min:1',
            'dueño' => 'required|string|max:255',
            'imagen' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
        ]);

        
        Mascota::create([
            'nombre' => $validated['nombre'],
            'especie' => $validated['especie'],
            'raza' => $validated['raza'],
            'edad' => $validated['edad'],
            'peso' => $validated['peso'],
            'dueño' => $validated['dueño'],
            'imagen' => $validated['imagen'],
            'contacto' => $validated['contacto'],
        ]);

        return \redirect()->route('mascotas.index')->with('succes','Macota guardada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $mascota = Mascota::findOrFail($request->mascota_id);

    
        return view('mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
            // Validar los datos del formulario
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'especie' => 'required|string|max:255',
                'raza' => 'required|string|max:255',
                'edad' => 'required|integer|min:1',
                'peso' => 'required|numeric|min:1',
                'dueño' => 'required|string|max:255',
                'imagen' => 'required|string|max:255',
                'contacto' => 'required|string|max:255',
            ]);
        
            // Buscar la cita por su ID
            $mascota = Mascota::findOrFail($id);
        
            // Actualizar la cita con los datos validados
            $mascota->update($validated);
        
            // Redirigir con un mensaje de éxito
            return redirect()->route('mascotas.index')->with('success', 'Mascota editada correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
            // Buscar la mascota por ID
    $mascota = Mascota::findOrFail($id);

    // Eliminar la mascota
    $mascota->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada con éxito');
    }
}
