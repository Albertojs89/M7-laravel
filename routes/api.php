<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PokemonController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Promise\Is;
use App\Http\Middleware\IsAdminAuth;
use App\Http\Middleware\IsUserAuth;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;

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

//PUBLIC ROUTES
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/pokemon', [PokemonController::class, 'index']);
Route::get('/pokemon/{id}', [PokemonController::class, 'show']);
Route::get('/my-Pokemons', [PokemonController::class, 'myCards']);


//PROTECTED ROUTES
Route::middleware([IsUserAuth::class])->group(function () {
    Route::get('me', [AuthController::class, 'getUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/pokemon', [PokemonController::class, 'store']);
    Route::get('/games', [GameController::class, 'index']);
    Route::post('/games', [GameController::class, 'store']);
    Route::put('/games/{game}/finish', [GameController::class, 'update']);
    Route::delete('/games/{game}', [GameController::class, 'destroy']);
    Route::get('/games/ranking', [GameController::class, 'ranking']);
    Route::get('/games/user/{id}', [GameController::class, 'getGamesByUserId']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
    Route::get('/pokemons/category/{categoryId}', [PokemonController::class, 'getByCategory']);

});




//ADMIN ROUTES
Route::middleware(\App\Http\Middleware\IsAdmin::class)->group(function () {
    Route::post('/pokemon', [PokemonController::class, 'store']);
    Route::put('/pokemon/{id}', [PokemonController::class, 'update']);
    Route::delete('/pokemon/{id}', [PokemonController::class, 'destroy']);
    Route::patch('/pokemon/{id}', [PokemonController::class, 'updatePartial']);

     // 👥 Gestió d'usuaris
     Route::get('users', [AuthController::class, 'getUsers']);
     Route::get('/users/{id}', [AuthController::class, 'getUserById']);
     Route::put('/users/{id}', [AuthController::class, 'updateUser']);
     Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);

     // CRUD de partides
        Route::get('/games', [GameController::class, 'index']);
        Route::get('/games/{game}', [GameController::class, 'show']);
        Route::put('/games/{game}', [GameController::class, 'update']);
        Route::delete('/games/{game}', [GameController::class, 'destroy']);
        
});


?>






