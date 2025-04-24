<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PokemonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Rutas de la API ---------------------------------------

//Devuelve todos los Pokemons
Route::get('/pokemon', [PokemonController::class, 'index']);

//Devuelve un Pokemon por ID
Route::get('/pokemon/{id}', [PokemonController::class, 'show']);

//Crea un Pokemon
Route::post('/pokemon', [PokemonController::class, 'store']);

//Actualiza un Pokemon
Route::put('/pokemon/{id}', [PokemonController::class, 'update']);

//Elimina un Pokemon
Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy']);

//Actualiza parcialmente un Pokemon
Route::patch('/pokemon/{id}', [PokemonController::class, 'updatePartial']);



?>






