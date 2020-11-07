<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tema/insert', [App\Http\Controllers\TemaController::class, 'insert']);
Route::post('/tema/create', [App\Http\Controllers\TemaController::class, 'create'])->name('tema/create');
Route::get('/tema/{id}', [App\Http\Controllers\TemaController::class, 'show']);
