<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar producto</h1>

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Título:</label>
        <input type="text" name="titulo" value="{{ $producto->titulo }}" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $producto->descripcion }}</textarea><br>

        <label>Estado:</label>
        <input type="text" name="estado" value="{{ $producto->estado }}"><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('productos.index') }}">⬅️ Volver</a>
</body>
</html>
