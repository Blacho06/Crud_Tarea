<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Agregar nuevo producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="titulo" required><br>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea><br>

        <label>Estado:</label>
        <input type="text" name="estado"><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('productos.index') }}">⬅️ Volver</a>
</body>
</html>
