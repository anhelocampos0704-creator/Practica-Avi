<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/cuenta', fn () => view('auth.cuenta'))->name('cuenta');

// Solo visitantes (sin sesión iniciada)
Route::middleware('guest')->group(function () {
    // Crear cuenta
    Route::get('/crear', [RegisterController::class, 'create'])->name('register');
    Route::post('/crear', [RegisterController::class, 'store'])->name('register.store');

    // Iniciar sesión
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

// Solo usuarios con sesión iniciada
Route::middleware('auth')->group(function () {
    // Editar perfil
    Route::get('/editarperfil', [ProfileController::class, 'edit'])->name('editarperfil');
    Route::patch('/editarperfil', [ProfileController::class, 'update'])->name('editarperfil.update');

    // Cerrar sesión
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
