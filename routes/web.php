<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\SeriesController;
use App\Models\Book;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('books',BookController::class);
Route::resource('series',SeriesController::class);




//web.php son rutas que devuelven vistas
?>

