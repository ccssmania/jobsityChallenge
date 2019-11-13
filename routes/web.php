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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Entry Routes
Route::resource('/entries','EntryController')->names('entries');

//Profile Route
Route::get('/profile/{user_id}', 'ProfileController@index')->name('profile');
Route::get('/profile/show/{entry_id}/{user_id}', 'ProfileController@show')->name('profile');

//tweets routes

Route::post('/tweets/hide/{tweet_id}/{user_id}', 'NoShowTweetController@hide');
Route::post('/tweets/show/{tweet_id}/{user_id}', 'NoShowTweetController@show');