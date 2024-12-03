<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all(); 
        return view('productos.index', compact('productos')); 
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:1',
            'cantidad' => 'required|numeric|min:0',
            'categoria' => 'required|string|max:255',
        ]);

        
        Producto::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio'],
            'cantidad' => $validated['cantidad'],
            'categoria' => $validated['categoria'],
        ]);

        return \redirect()->route('productos.index')->with('succes','Producto guardado correctamente.');
    
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
        $producto = Producto::findOrFail($request->producto_id);
        return view('productos.edit', compact('producto'));
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
                'precio' => 'required|numeric|min:1',
                'cantidad' => 'required|numeric|min:0',
                'categoria' => 'required|string|max:255',
            ]);
        
            // Buscar la cita por su ID
            $producto = Producto::findOrFail($id);
        
            // Actualizar la cita con los datos validados
            $producto->update($validated);
        
            // Redirigir con un mensaje de éxito
            return redirect()->route('productos.index')->with('success', 'Producto editado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    $producto = Producto::findOrFail($id);
    $producto->delete();

    // Redirigir con un mensaje de éxito
    return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    
    }
}
