<?php

use App\Http\Controllers\IngController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2Dropdown;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/ingredients', IngController::class);
Route::resource('/recipe', RecipeController::class);
Route::get('/', Select2Dropdown::class);

require __DIR__.'/auth.php';
