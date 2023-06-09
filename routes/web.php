<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware('auth')->name('dashboard');
Route::get('/logout', [LoginController::class, 'logout']);
Route::resource('tasklist', TaskListController::class)
    ->middleware('auth');
Route::resource('tasklist.task', TaskController::class)
    ->middleware('auth');
Route::patch('/{tasklist}/{task}/done', [TaskController::class, 'done'])
    ->middleware('auth')->name('tasklist.task.done');
Route::resource('tasklist.task.item', ItemController::class)
    ->middleware('auth');
