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

Route::get('/', function () {
    Auth::logout();
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/', function () { return view('users.index');});


Route::get('/users', 'UserController@index')->name('user-index');
Route::get('/users/create', 'UserController@create')->name('user-create');
Route::get('/users/edit/{userId}', 'UserController@edit')->name('user-edit');
Route::post('/users/store', 'UserController@store')->name('user-store');
Route::post('/users/update/{userId}', 'UserController@update')->name('user-update');
Route::post('/users/delete', 'UserController@destroy')->name('user-destroy');
