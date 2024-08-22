<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserProfileController;
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
Route::controller(TaskController::class)->middleware('auth')->group(function(){
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

Route::controller(ProjectController::class)->middleware('auth')->group(function(){
    // Route::patch('/makepayment', 'pay')->name('pay');
    Route::get('/project', 'index')->name('project');
    Route::get('/project/create', 'create')->name('create-project');
    Route::get('/project/{project}/edit', 'edit')->name('edit-project');
    Route::post('/project/store', 'store')->name('store-project');
    Route::get('/project/{project}', 'show')->name('show-project');
    Route::delete('/project/{project}', 'destroy')->name('delete-project');
    Route::get('/project/{project}/task/create', 'createTask')->name('create-project-task');
    Route::post('/project/{project}/task/store', 'storeTask')->name('store-project-task');
    Route::get('/search-user', 'searchUser')->name('search-user');
});

Route::controller(UserProfileController::class)->middleware('auth')->group(function(){
    Route::get('/profile', 'index')->name('profile');
    Route::get('/profile/create', 'create')->name('create-profile');
    Route::post('/profile/store', 'store')->name('store-profile');
    Route::get('/profile/{userprofile}', 'show')->name('show-profile');
    Route::patch('/profile/{userprofile}', 'update')->name('update-profile');
});