<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;  
class serviciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
                //
        // Obtener todas las mascotas de la base de datos
        $servicios = Servicio::all(); // Recupera todas las mascotas

        // Pasar las mascotas a la vista
        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('servicios.create');
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
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|integer|min:1',
        ]);

        
        Servicio::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
        ]);

        return \redirect()->route('servicios.index')->with('succes','Servicio guardada correctamente.');
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
    public function edit(string $id)
    {
        //
        $servicio = Servicio::findOrFail($id);
    
        return view('servicios.edit', compact('servicio'));
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
                'descripcion' => 'required|string|max:255',
                'precio' => 'required|integer|min:1',
            ]);
        
            // Buscar la cita por su ID
            $servicio = Servicio::findOrFail($id);
        
            // Actualizar la cita con los datos validados
            $servicio->update($validated);
        
            // Redirigir con un mensaje de éxito
            return redirect()->route('servicios.index')->with('success', 'Servicio editada correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    $servicio = Servicio::findOrFail($id);
    $servicio->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('servicios.index')->with('success', 'Servicio eliminada con éxito');
    
    }
}
