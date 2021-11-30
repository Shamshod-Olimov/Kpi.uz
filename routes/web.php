<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('index'); });

Route::get('/leadership', 'App\Http\Controllers\LeadershipController@index');
Route::get('/leadership/add', 'App\Http\Controllers\LeadershipController@create');
Route::post('/leadership/add', 'App\Http\Controllers\LeadershipController@store');
Route::get('/leadership/edit/{id}', 'App\Http\Controllers\LeadershipController@edit');
Route::post('/leadership/edit/{id}', 'App\Http\Controllers\LeadershipController@update');
Route::get('/leadership/delete/{id}', 'App\Http\Controllers\LeadershipController@destroy');

Route::get('/department', 'App\Http\Controllers\DepartmentController@index');
Route::get('/department/add', 'App\Http\Controllers\DepartmentController@create');
Route::post('/department/add', 'App\Http\Controllers\DepartmentController@store');
Route::get('/department/edit/{id}', 'App\Http\Controllers\DepartmentController@edit');
Route::post('/department/edit/{id}', 'App\Http\Controllers\DepartmentController@update');
Route::get('/department/delete/{id}', 'App\Http\Controllers\DepartmentController@destroy');

Route::get('/section', 'App\Http\Controllers\SectionController@index');
Route::get('/section/add', 'App\Http\Controllers\SectionController@create');
Route::post('/section/add', 'App\Http\Controllers\SectionController@store');
Route::get('/section/edit/{id}', 'App\Http\Controllers\SectionController@edit');
Route::post('/section/edit/{id}', 'App\Http\Controllers\SectionController@update');
Route::get('/section/delete/{id}', 'App\Http\Controllers\SectionController@destroy');

Route::get('/worker', 'App\Http\Controllers\WorkerController@index');
Route::get('/worker/add', 'App\Http\Controllers\WorkerController@create');
Route::post('/worker/add', 'App\Http\Controllers\WorkerController@store');
Route::get('/worker/edit/{id}', 'App\Http\Controllers\WorkerController@edit');
Route::post('/worker/edit/{id}', 'App\Http\Controllers\WorkerController@update');
Route::get('/worker/delete/{id}', 'App\Http\Controllers\WorkerController@destroy');

Route::get('/calculator', 'App\Http\Controllers\CalculatorController@index');
Route::post('/calculator', 'App\Http\Controllers\CalculatorController@calculate');
Route::get('/information', 'App\Http\Controllers\CalculatorController@show');
Route::get('/calculator/delete/{id}', 'App\Http\Controllers\CalculatorController@destroy');


