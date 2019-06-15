<?php

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

Route::get('/', 'MoviesController@index');
Route::get('/create', 'MoviesController@create');
Route::post('/store', 'MoviesController@store');
Route::get('movies/destroy/{id}', 'MoviesController@destroy');
Route::get('/movies/show/{id}', 'MoviesController@show');


?>
