<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

// Ruta principal del CRUD
Route::get('/', function () {
    return redirect()->route('.index');
});

// Rutas tipo resource para el CRUD de productos
Route::prefix('users/Crud_Tarea')->group(function () {
    Route::resource('productos', ProductoController::class);
});

