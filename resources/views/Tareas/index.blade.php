<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { margin-bottom: 10px; }
        .subtitle { color: #666; margin-bottom: 20px; }
        .header { margin-bottom: 20px; }
        .btn-agregar { background-color: #4266bbff; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-agregar:hover { background-color: #0e111aff; }
        .success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th { background-color: #f8f9fa; padding: 12px; text-align: left; font-weight: bold; border-bottom: 2px solid #dee2e6; }
        table td { padding: 12px; border-bottom: 1px solid #dee2e6; }
        table tr:hover { background-color: #f8f9fa; }
        .btn-editar { 
            background-color: #007bff; 
            color: white; 
            border: none; 
            cursor: pointer; 
            padding: 6px 12px; 
            margin: 0 3px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
            display: inline-block;
        }
        .btn-editar:hover { 
            background-color: #0056b3; 
            color: white;
        }
        .btn-eliminar { 
            background-color: #dc3545; 
            color: white; 
            border: none; 
            cursor: pointer; 
            padding: 6px 12px; 
            margin: 0 3px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
        }
        .btn-eliminar:hover { 
            background-color: #c82333; 
            color: white;
        }
        .prioridad-alta { color: #dc3545; font-weight: bold; }
        .prioridad-media { color: #ffc107; font-weight: bold; }
        .prioridad-baja { color: #28a745; font-weight: bold; }
        .estado-pendiente { color: #6c757d; font-weight: bold; }
        .estado-progreso { color: #17a2b8; font-weight: bold; }
        .estado-completado { color: #28a745; font-weight: bold; }
        .estado-cancelado { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Gestión de Productos</h1>
    <p class="subtitle">Administra los productos del sistema</p>
    
    <div class="header">
        <a href="{{ route('productos.create') }}" class="btn-agregar">Agregar Producto</a>
    </div>
    
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>TÍTULO</th>
                <th>DESCRIPCIÓN</th>
                <th>FECHA ASIGNACIÓN</th>
                <th>FECHA VENCIMIENTO</th>
                <th>PRIORIDAD</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->titulo }}</td>
                <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                <td>{{ \Carbon\Carbon::parse($producto->fecha_asignacion)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') }}</td>
                <td><span class="prioridad-{{ strtolower($producto->prioridad) }}">{{ $producto->prioridad }}</span></td>
                <td><span class="estado-{{ strtolower(str_replace(' ', '-', $producto->estado)) }}">{{ $producto->estado }}</span></td>
                <td>
                    <a href="{{ route('productos.edit', $producto) }}" class="btn-editar">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align: center;">No hay productos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>