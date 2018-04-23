<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin/edit/{user}', 'AdminController@edit');
Route::patch('/admin/{user}', 'AdminController@update');
Route::delete('/admin/{user}', 'AdminController@destroy');

Route::get('/prof/edit/{task}', 'ProfController@edit');
Route::get('/prof/new', 'ProfController@newTask');
Route::get('/prof/reservations', 'ProfController@reservations');
Route::post('/prof/new', 'ProfController@store');
Route::patch('/prof/{task}', 'ProfController@update');
Route::delete('/prof/{task}', 'ProfController@destroy');
Route::post('/prof/task/{task}', 'ProfController@approve');
Route::delete('/prof/task/{task}', 'ProfController@disapprove');

Route::get('/student/reserve/{task}', 'StudentController@reserve');
Route::get('/student/reservations', 'StudentController@reservations');
Route::delete('/student/{task}', 'StudentController@destroy');


Route::get('/proba', 'HomeController@proba');
