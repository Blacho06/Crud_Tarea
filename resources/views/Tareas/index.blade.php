<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { margin-bottom: 10px; }
        .subtitle { color: #666; margin-bottom: 20px; }
        .header { margin-bottom: 20px; }
        .btn-agregar { background-color: #dc3545; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-agregar:hover { background-color: #c82333; }
        .success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th { background-color: #f8f9fa; padding: 12px; text-align: left; font-weight: bold; border-bottom: 2px solid #dee2e6; }
        table td { padding: 12px; border-bottom: 1px solid #dee2e6; }
        table tr:hover { background-color: #f8f9fa; }
        .btn-editar, .btn-eliminar { color: #dc3545; background: none; border: none; cursor: pointer; padding: 0; }
        .btn-eliminar { color: #dc3545; }
    </style>
</head>
<body>
    <h1>Gestión de Usuarios</h1>
    <p class="subtitle">Administra los usuarios del sistema</p>
    
    <div class="header">
        <a href="{{ route('usuarios.create') }}" class="btn-agregar">➕ Agregar Usuario</a>
    </div>
    
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>
                <th>TELÉFONO</th>
                <th>ROL</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->phone ?? '-' }}</td>
                <td>{{ $usuario->role }}</td>
                <td>
                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn-editar">✏️ Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Seguro?')">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No hay usuarios registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
