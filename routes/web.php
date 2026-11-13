<?php

use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Route;


// Redirigir la página principal al listado.
Route::redirect('/', '/aprendices');


// Rutas del CRUD de Aprendices.
Route::resource(
    'aprendices',
    AprendizController::class
)
->parameters(['aprendices' => 'aprendiz'])
->except(['show']);