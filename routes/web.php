<?php

use App\Http\Controllers\TomakesController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

                Route::get('/', function () {
                    return view('welcome');
                });
*/

Route::get('/', [TomakesController::class, 'index'])->name('tomakes');

Route::get('/tareas', [TomakesController::class, 'index'])->name('tomakes');

Route::post('/tareas', [TomakesController::class, 'store'])->name('tomakes');

Route::get('/tareas/{id}', [TomakesController::class, 'show'])->name('tomakes-edit');

Route::patch('/tareas/{id}', [TomakesController::class, 'update'])->name('tomakes-update');

Route::delete('/tareas/{id}', [TomakesController::class, 'destroy'])->name('tomakes-destroy');

Route::resource('categories', CategoriesController::class);
