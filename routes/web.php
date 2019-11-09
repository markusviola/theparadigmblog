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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('profile/{user_url}', 'ProfileController@index')->name('profile');
Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
Route::patch('profile/{user}/upload', 'ProfileController@updateHeaderImg')->name('profile.updateHeaderImg');
Route::resource('posts','BlogPostsController');
Route::resource('users','UsersController');
Route::resource('comments','CommentsController');
Route::resource('settings', 'SettingsController');
Route::resource('likes', 'LikesController');

Route::get('/chat','ChatController@index');
Route::get('/messages','ChatController@fetchMessages');
Route::post('/messages','ChatController@sendMessage');

// Temporary Feature
Route::get('/portfolio','PortfolioController@index');


