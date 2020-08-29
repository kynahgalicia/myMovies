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
Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::resource('movies', 'MoviesController')->middleware('auth');

Route::get('/movies/restore/{id}',['uses' => 'MoviesController@restore', 'as' => 'movies.restore']);

Route::resource('actors', 'ActorsController');

Route::get('/home', 'HomeController@index')->name('home');