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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::post('/posts/create', 'PostController@store')->middleware('auth');

Route::get('/posts/movie', 'PostController@showMovies');
Route::get('/posts/tvshow', 'PostController@showTvshow');
Route::get('/posts/author/{id}', 'PostController@showAuthorPosts');

Route::post('/posts/comment/{id}', 'CommentController@store');

Route::get('/posts/{id}', 'PostController@show');

Route::get('/posts/{id}/edit', 'PostController@edit')->middleware('auth');

Route::patch('/posts/{id}', 'PostController@update')->middleware('auth');

Route::delete('/posts/{id}','PostController@destroy')->middleware('auth');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
