<?php

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
    Route::get('/', 'index'); # change to /task
    Route::get('/task/create', 'create');
    Route::post('/task/store', 'store');
});
Route::get('/workspace', function () {
    return view('workspace.index');
});
Route::get('/project', function () {
    return view('project.index');
});
