<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
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
*/
Route::controller(TaskController::class)->group(function(){
    Route::get('/', 'index')->name('home'); # change to /task
    Route::get('/tasks/create', 'create');
    Route::post('/tasks/store', 'store');
    Route::get('/tasks/show/{task}', 'show')->name('show-task');
    Route::get('/task/{task}/edit', 'edit');
    Route::patch('/task/{task}', 'update');
    Route::delete('/task/{task}', 'destroy');
});

Route::controller(SessionController::class)->group(function(){
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login-user');
    Route::get('/logout', 'destroy')->name('logout');
});
Route::get('/workspace', function () {
    return view('workspace.index');
});
Route::get('/project', function () {
    return view('project.index');
});
