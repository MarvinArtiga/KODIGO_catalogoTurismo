<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LugarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LugarController::class, 'index'])->name('home');
Route::get('/lugares/{lugar}', [LugarController::class, 'show'])->name('lugares.show');

Route::get('/contacto', [ContactoController::class, 'create'])->name('contacto.create');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
