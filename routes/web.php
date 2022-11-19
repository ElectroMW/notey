<?php

use App\Http\Controllers\Note;
use App\Http\Controllers\User;
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

Route::middleware('auth')->group(function(){
    Route::get('/', [Note::class, 'index'])
        ->name('index');

    Route::post('/logout', [User::class, 'postLogout'])
        ->name('logout');

    Route::get('/notes/add', [Note::class, 'getAdd'])
        ->name('notes.add');

    Route::post('/notes/add', [Note::class, 'postAdd'])
        ->name('notes.add.post');

    Route::get('/notes/edit/{note}', [Note::class, 'getEdit'])
        ->name('notes.edit');

    Route::post('/notes/edit/{note}', [Note::class, 'postEdit'])
        ->name('notes.edit.post');
});


Route::get('/login', [User::class, 'getLogin'])
    ->name('login');

Route::post('/login', [User::class, 'postLogin'])
    ->name('login.post');

Route::get('/register', [User::class, 'getRegister'])
    ->name('register');

Route::post('/register', [User::class, 'postRegister'])
    ->name('register.post');
