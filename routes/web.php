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

Route::get('/', 'InfoController@home');

Route::get('/about', 'InfoController@about');

Route::resource('/star', 'StarController', ['only' => ['index', 'show']]);
Route::resource('/school', 'SchoolController', ['only' => ['index', 'show']]);
Route::resource('/page', 'PageController', ['only' => ['index', 'show']]);

Route::get('/ed/403', 'InfoController@ed403');
