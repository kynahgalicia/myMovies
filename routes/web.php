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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::resource('actors', 'ActorsController');
Route::resource('movies', 'MoviesController');
Route::resource('producers', 'ProducersController');
Route::resource('genres', 'GenresController');
Route::resource('ratings', 'RatingsController');
Route::resource('roles', 'RolesController');
Route::resource('actormovieroles', 'ActorMovieRolesController')->middleware('auth');

Route::get('/movies/restore/{id}',['uses' => 'MoviesController@restore', 'as' => 'movies.restore']);
Route::get('/actors/restore/{id}',['uses' => 'ActorsController@restore', 'as' => 'actors.restore']);


