<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('todo/search', 'TodoController@search')->name('todo.search');
Route::get('todo/cancel/{id}', 'TodoController@cancel')->name('todo.cancel');
Route::get('todo/normal/{id}', 'TodoController@normal')->name('todo.normal');
Route::resource('/todo', 'TodoController');
Route::resource('/category', 'CategoryController');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/data', 'TodoController@data')->name('datatables.data');
Route::get('datatable', 'TodoController@datatable');
Route::get('contact', function() {
    return view('todo.contact');
});