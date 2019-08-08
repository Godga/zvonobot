<?php
use App\Posts;
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

Route::get('/', 'ZvonController@index');
Route::get('/register', "ZvonController@register");

Route::get('/posts', 'PostsController@index');
Route::get('/home/create', 'PostsController@create'); 
Route::get('/home/{id}', 'PostsController@show'); 
Route::get('/home/{id}/edit', 'PostsController@edit'); 
Route::put('/home/{id}', 'PostsController@update'); 
Route::post('/home/store', 'PostsController@store'); 
Route::delete('/home/{id}', 'PostsController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
