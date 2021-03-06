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


Route::get ('/', 'IdeaController@index');
Route::get ('/idea/add', 'IdeaController@add');
Route::post('/idea/add', 'IdeaController@create');
Route::get ('/ideas/{id?}', 'IdeaController@show');
Route::get ('/ideas/edit/{id?}', 'IdeaController@edit')->middleware('auth');
Route::post('/ideas/edit/{id?}', 'IdeaController@update')->middleware('auth');
Route::get ('/ideas/delete/{id?}', 'IdeaController@delete')->middleware('auth');
Route::post('/ideas/delete/{id?}', 'IdeaController@remove')->middleware('auth');

Route::get ('/users/{id?}', 'UserController@index');

Route::post('/like/add', 'LikeController@add_like');
Route::post('/like/remove', 'LikeController@remove_like');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register/verify/{token}', 'Auth\RegisterController@verify');
