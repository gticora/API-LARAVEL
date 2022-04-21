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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/usuarios', 'App\Http\Controllers\UserController@index')
    ->name('users.index');

Route::get('/usuarios/nuevo', [App\Http\Controllers\UserController::class, 'form_users'])
    ->name('users.crear_usuarios');

Route::post('/usuarios/nuevo', [App\Http\Controllers\UserController::class, 'create'])
  ->name('users.create');

Route::get('/home', 'App\Http\Controllers\UserController@index')
    ->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
    ->where('user', '[0-9]+')
    ->name('users.show');

Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
