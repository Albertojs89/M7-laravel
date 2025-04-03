<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::get('/students', function () {
//     return "lista de estudiantes";
// });


Route::get('/students',[StudentController::class, 'index']);

Route::get('/students/{id}',[StudentController::class, 'show']);

/*

<!--

GET => LEER {ID}
POST => AÑADIR
PUT => ACTUALIZAR {ID}
DELETE => ELIMINAR {ID}
PATCH => ACTUALIZAR PARCIAL {ID}

LA CONCHA DE TU MAREEE
-->



*/

?>






