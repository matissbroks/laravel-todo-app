<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Base route: http://laraveltodoapp.test/

Route::get('/', [TodoController::class, "index"])->name('todo.index');

Route::post('/todo-save', [TodoController::class, "save"])->name('todo.save');

Route::get('/todo-done/{todo}', [TodoController::class, "markDone"])->name('todo.done');

Route::get('/todo-delete/{todo}', [TodoController::class, "delete"])->name('todo.delete');
