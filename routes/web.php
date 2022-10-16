<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\PantsController;
use App\Http\Controllers\JacketsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('clothes', ClothesController::class);
Route::resource('pants', PantsController::class);
Route::resource('jackets', JacketsController::class);

Route::get('/coordinate/search/input', [SearchController::class, 'create'])->name('search.input');
Route::get('/coordinate/search/result', [SearchController::class, 'index'])->name('search.result');

Route::post('/coordinate/search/result', [FavoriteController::class, 'store'])->name('favorites');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
