<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ConfigController;

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


Route::get('/categorias', [CategoriesController::class, 'index'])->middleware(['auth'])->name('categories.index');
Route::get('/categorias/criar', [CategoriesController::class, 'create'])->middleware(['auth'])->name('categories.create');
Route::post('/categorias/criar', [CategoriesController::class, 'store'])->middleware(['auth'])->name('categories.store');
Route::get('/categorias/editar/{id}', [CategoriesController::class, 'edit'])->middleware(['auth'])->name('categories.edit');
Route::PUT('/categorias/editar/{id}', [CategoriesController::class, 'update'])->middleware(['auth'])->name('categories.update');
Route::DELETE('/categorias/excluir/{id}', [CategoriesController::class, 'destroy'])->middleware(['auth'])->name('categories.destroy');

Route::get('/notas', [NotesController::class, 'index'])->middleware(['auth'])->name('notes.index');
Route::get('/notas/criar', [NotesController::class, 'create'])->middleware(['auth'])->name('notes.create');
Route::post('/notas/criar', [NotesController::class, 'store'])->middleware(['auth'])->name('notes.store');
Route::get('/notas/editar/{id}', [NotesController::class, 'edit'])->middleware(['auth'])->name('notes.edit');
Route::PUT('/notas/editar/{id}', [NotesController::class, 'update'])->middleware(['auth'])->name('notes.update');
Route::DELETE('/notas/excluir/{id}', [NotesController::class, 'destroy'])->middleware(['auth'])->name('notes.destroy');

Route::get('/config', [ConfigController::class, 'index'])->middleware(['auth'])->name('config');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
