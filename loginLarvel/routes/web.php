<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::view('/login','login'

);

// Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/registartion', [UserController::class, 'registartion']);
Route::post('/registartion-user', [UserController::class, 'registartionUser'])->name('registartion-user');
Route::post('/login-user', [UserController::class, 'loginUser'])->name('login-user');


Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');







