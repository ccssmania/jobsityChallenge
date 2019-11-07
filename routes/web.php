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
Route::get('/entries/create', 'EntryController@create')->name('entries');
Route::post('/entries/create', 'EntryController@store')->name('entries');
Route::get('/entries/edit/{entry_id}', 'EntryController@edit')->name('entries');
Route::post('/entries/edit/{entry_id}', 'EntryController@update')->name('entries');