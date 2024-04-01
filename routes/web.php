<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects', function () {
        return view ('projects');
    })->name('projects.index');

    Route::get('/budgets', function() {
        return view ('budgets');
    })->name('budgets.index');


Route::get('/projects/create', function () {
    return view ('projects.create');
})->name('projects.create');
});
// routes/web.php
Route::post('/createProject', [ProjectController::class,'store']);


Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

Route::get('/projects/{project}', [ProjectController:: class,  'edit'], function() {
    return view ('projects.edit');
})->name('projects.edit');

// routes/web.php

Route::get('/projects/search', [ProjectController::class, 'search'], function() {
    return view ('projects.search');
})->name('projects.search');


