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

Route::get('/', 'HomeController@index')->name('index');


Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');


Route::get('/form', 'HomeController@form')->name('form');
Route::get('/form-delete/{elem}', 'HomeController@formDel')->name('form-delete');

Route::post('/add-inv', 'HomeController@add')->name('add-inv');
Route::post('/edit-inv/{id}', 'HomeController@edit')->name('edit-inv');
Route::post('/confirm-edit-inv/{id}', 'HomeController@confirmEdit')->name('confirm-edit-inv');
Route::post('/delete-inv/{id}', 'HomeController@delete')->name('delete-inv');

Route::middleware(['auth'])->group(function() { 
});
