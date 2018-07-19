<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('todo/store','TodosController@store')->name('todo.store');
Route::get('todo/edit/{id}','TodosController@edit')->name('todo.edit');
Route::put('todo/update/{id}','TodosController@update')->name('todo.update');
Route::delete('todo/delete/{id}','TodosController@destroy')->name('todo.delete');
