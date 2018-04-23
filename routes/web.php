<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin/edit/{user}', 'AdminController@edit');
Route::patch('/admin/{user}', 'AdminController@update');
Route::delete('/admin/{user}', 'AdminController@destroy');





Route::get('/proba', 'HomeController@proba');
