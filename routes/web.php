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
Route::get('/userlist', [App\Http\Controllers\HomeController::class, 'userList'])->name('userList');
Route::get('/userlist/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
Route::put('/userlist/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('userlist/update');
Route::get('/userlist/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete']);
Route::delete('/userlist/confdelete/{id}', [App\Http\Controllers\HomeController::class, 'confirmDeletion'])->name('userlist/cdelete');
Route::get('/userlist/{id}', [App\Http\Controllers\HomeController::class, 'show']);

Route::get('/tema/pending', [App\Http\Controllers\TemaController::class, 'students'])->name('tema/pending');
Route::put('/tema/pending/accept/{id}/confirm', [App\Http\Controllers\TemaController::class, 'confirmAcceptStudent'])->name('tema/pending/accept');
Route::put('/tema/pending/deny/{id}/confirm', [App\Http\Controllers\TemaController::class, 'confirmDenyStudent'])->name('tema/pending/deny');
Route::get('/tema/pending/accept/{id}', [App\Http\Controllers\TemaController::class, 'acceptStudent']);
Route::get('/tema/pending/deny/{id}', [App\Http\Controllers\TemaController::class, 'denyStudent']);;
Route::get('/tema/insert', [App\Http\Controllers\TemaController::class, 'insert']);
Route::post('/tema/create', [App\Http\Controllers\TemaController::class, 'create'])->name('tema/create');
Route::get('/tema/abandon', [App\Http\Controllers\TemaController::class, 'abandon']);
Route::put('/tema/accept/{id}', [App\Http\Controllers\TemaController::class, 'accept'])->name('tema/accept/');
Route::put('/tema/abandon/{id}', [App\Http\Controllers\TemaController::class, 'confirmAbandonment'])->name('tema/caband');
Route::get('/tema/edit/{id}', [App\Http\Controllers\TemaController::class, 'edit']);
Route::put('/tema/update/{id}', [App\Http\Controllers\TemaController::class, 'update'])->name('tema/update');
Route::get('/tema/choose/{id}', [App\Http\Controllers\TemaController::class, 'choose']);
Route::get('/tema/delete/{id}', [App\Http\Controllers\TemaController::class, 'delete']);
Route::delete('/tema/confdelete/{id}', [App\Http\Controllers\TemaController::class, 'confirmDeletion'])->name('tema/cdelete');
Route::get('/tema/{id}', [App\Http\Controllers\TemaController::class, 'show']);

Route::get('/siuloma', [App\Http\Controllers\SiulomaController::class, 'index'])->name('siuloma');
Route::get('/siuloma/insert', [App\Http\Controllers\SiulomaController::class, 'insert']);
Route::post('/siuloma/create', [App\Http\Controllers\SiulomaController::class, 'create'])->name('siuloma/create');
Route::get('/siuloma/edit/{id}', [App\Http\Controllers\SiulomaController::class, 'edit']);
Route::put('/siuloma/update/{id}', [App\Http\Controllers\SiulomaController::class, 'update'])->name('siuloma/update');
Route::get('/siuloma/delete/{id}', [App\Http\Controllers\SiulomaController::class, 'delete']);
Route::delete('/siuloma/confdelete/{id}', [App\Http\Controllers\SiulomaController::class, 'confirmDeletion'])->name('siuloma/cdelete');
Route::get('/siuloma/approve/{id}', [App\Http\Controllers\SiulomaController::class, 'approve']);
Route::post('/siuloma/confapprove/{id}', [App\Http\Controllers\SiulomaController::class, 'accept'])->name('tema/capprove');
Route::get('/siuloma/{id}', [App\Http\Controllers\SiulomaController::class, 'show']);
