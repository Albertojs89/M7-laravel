<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\IsAdmin;

// =========================
// PUBLIC ROUTES (sin login)
// =========================

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ==============================
// PROTECTED ROUTES (logueado)
// ==============================

Route::middleware([IsUserAuth::class])->group(function () {

    // Autenticación
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Mascotas (solo las del usuario autenticado)
    Route::get('/pets', [PetController::class, 'index']);
    Route::post('/pets', [PetController::class, 'store']);
    Route::put('/pets/{id}', [PetController::class, 'update']);
    Route::patch('/pets/{id}', [PetController::class, 'partialUpdate']);
    Route::delete('/pets/{id}', [PetController::class, 'destroy']);
});

// ====================================
// ADMIN ROUTES (logueado y admin)
// ====================================

Route::middleware([IsUserAuth::class, IsAdmin::class])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/users/{id}/pets', [UserController::class, 'userPets']);
});


?>






