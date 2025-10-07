<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos</h1>

    <a href="{{ route('productos.create') }}">➕ Agregar nuevo</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->titulo }}</td>
            <td>{{ $producto->estado }}</td>
            <td>
                <a href="{{ route('productos.edit', $producto) }}">✏️ Editar</a>
                <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
