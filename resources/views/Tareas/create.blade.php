<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px auto; 
            max-width: 600px; 
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        textarea { resize: vertical; min-height: 80px; }
        .error { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 20px; }
        .button-group { margin-top: 20px; }
        .btn-cancelar, .btn-guardar { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-cancelar { background-color: #6c757d; color: white; }
        .btn-guardar { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Crear Producto</h1>
    
    @if ($errors->any())
        <div class="error">
            <strong>¡Por favor corrige los errores!</strong>
            <ul style="margin-left: 20px; margin-top: 10px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" placeholder="Descripción del producto">{{ old('descripcion') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="fecha_asignacion">Fecha de Asignación</label>
            <input type="date" id="fecha_asignacion" name="fecha_asignacion" value="{{ old('fecha_asignacion') }}" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_vencimiento">Fecha de Vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ old('fecha_vencimiento') }}" required>
        </div>
        
        <div class="form-group">
            <label for="prioridad">Prioridad</label>
            <select id="prioridad" name="prioridad" required>
                <option value="">Seleccionar...</option>
                <option value="Alta">Alta</option>
                <option value="Media">Media</option>
                <option value="Baja">Baja</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="estado">Estado</label>
            <select id="estado" name="estado" required>
                <option value="">Seleccionar...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En Progreso">En Progreso</option>
                <option value="Completado">Completado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" placeholder="Observaciones adicionales">{{ old('observaciones') }}</textarea>
        </div>
        
        <div class="button-group">
            <a href="{{ route('productos.index') }}" class="btn-cancelar">Cancelar</a>
            <button type="submit" class="btn-guardar">Guardar</button>
        </div>
    </form>
    </div>
</body>
</html>