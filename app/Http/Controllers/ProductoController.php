<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('Tareas.index', compact('productos'));
    }

    public function create()
    {
        return view('Tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_asignacion' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'prioridad' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Registro creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        return view('Tareas.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_asignacion' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'prioridad' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'observaciones' => 'nullable|string',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Registro eliminado correctamente.');
    }
}