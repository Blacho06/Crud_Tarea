<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; max-width: 600px; }
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
    <h1>Crear Usuario</h1>
    
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
    
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Nombre completo</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+34 600 123 456">
        </div>
        
        <div class="form-group">
            <label for="role">Rol</label>
            <select id="role" name="role" required>
                <option value="">Seleccionar...</option>
                <option value="Administrador">Administrador</option>
                <option value="Usuario">Usuario</option>
                <option value="Editor">Editor</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label for="notes">Notas adicionales</label>
            <textarea id="notes" name="notes" placeholder="Información adicional sobre el usuario">{{ old('notes') }}</textarea>
        </div>
        
        <div class="button-group">
            <a href="{{ route('usuarios.index') }}" class="btn-cancelar">Cancelar</a>
            <button type="submit" class="btn-guardar">Guardar</button>
        </div>
    </form>
</body>
</html>