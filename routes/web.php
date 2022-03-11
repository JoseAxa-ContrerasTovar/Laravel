<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
DB::listen(function($query){
    var_dump($query->sql);
});
*/

Route::view('/', 'home') -> name('home');

Route::view('/quienes-somos', 'about') -> name('about');

Route::resource('/proyecto', ProjectController::class)
    -> parameters(['proyecto' => 'project'])
    -> names('projects');


Route::get('/categorias/{category}', [CategoryController::class, 'show']) -> name('categories.show');

/*
Route::get('/proyecto', [ProjectController::class, 'index']) -> name('projects.index');
Route::get('/proyecto/crear', [ProjectController::class, 'create']) -> name('projects.create');
Route::get('/proyecto/{project}/editar', [ProjectController::class, 'edit']) -> name('projects.edit');
Route::patch('/proyecto/{project}', [ProjectController::class, 'update']) -> name('projects.update');
Route::post('/proyecto', [ProjectController::class, 'store']) -> name('projects.store');
Route::get('/proyecto/{project}', [ProjectController::class, 'show']) -> name('projects.show');
Route::delete('/proyecto/{project}', [ProjectController::class, 'destroy']) -> name('projects.destroy');
*/

Route::view('/contacto', 'contact') -> name('contact');
Route::post('contact', [MessageController::class, 'store']) -> name('messages.store');
Auth::routes([ 'register' => false]);

