<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;

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


Route::resource('users', UserController::class);

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');


Route::resource('themes', ThemeController::class)->middleware('checkThemeRole');

Route::resource('posts', PostController::class);


Route::post('themes/settheme','App\Http\Controllers\CookieController@setTheme')->name('theme.setCookie');




