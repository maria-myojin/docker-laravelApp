<?php

use Illuminate\Support\Facades\Route;

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

//一覧画面
Route::get('index', 'App\Http\Controllers\TaskController@index')->name('index');

Route::post('create', 'App\Http\Controllers\TaskController@createTask')->name('create');

Route::get('create_page', 'App\Http\Controllers\TaskController@createTaskPage')->name('create_page');

Route::get('index/{id?}', 'App\Http\Controllers\TaskController@deleteTask')->name('delete');

Route::get('edit/{id?}', 'App\Http\Controllers\TaskController@editTaskPage')->name('edit_page');

Route::post('update', 'App\Http\Controllers\TaskController@update')->name('update');

Route::get('search', 'App\Http\Controllers\TaskController@search')->name('search');

Auth::routes();
