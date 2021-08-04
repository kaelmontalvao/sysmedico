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
    // Auth::logout();
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/', function () { return view('users.index');});
Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('/', 'UserController@index')->name('user-index');
        Route::get('/create', 'UserController@create')->name('user-create');
        Route::get('/edit/{userId}', 'UserController@edit')->name('user-edit');
        Route::get('/read/{userId}', 'UserController@read')->name('user-read');
        Route::post('/store', 'UserController@store')->name('user-store');
        Route::post('/update/{userId}', 'UserController@update')->name('user-update');
        Route::get('/delete/{userId}', 'UserController@delete')->name('user-delete');
        Route::post('/destroy/{userId}', 'UserController@destroy')->name('user-destroy');
    });
    Route::group(['prefix' => 'paciente'], function(){
        Route::get('/', 'PatientController@index')->name('patient-index');
        Route::get('/create', 'PatientController@create')->name('patient-create');
        Route::get('/edit/{id}', 'PatientController@edit')->name('patient-edit');
        Route::get('/read/{id}', 'PatientController@read')->name('patient-read');
        Route::post('/store', 'PatientController@store')->name('patient-store');
        Route::post('/update/{id}', 'PatientController@update')->name('patient-update');
        Route::get('/delete/{id}', 'PatientController@delete')->name('patient-delete');
        Route::post('/destroy/{id}', 'PatientController@destroy')->name('patient-destroy');
    });
    Route::group(['prefix' => 'medico'], function(){
        Route::get('/', 'DoctorController@index')->name('doctor-index');
        Route::get('/create', 'DoctorController@create')->name('doctor-create');
        Route::get('/edit/{id}', 'DoctorController@edit')->name('doctor-edit');
        Route::get('/read/{id}', 'DoctorController@read')->name('doctor-read');
        Route::post('/store', 'DoctorController@store')->name('doctor-store');
        Route::post('/update/{id}', 'DoctorController@update')->name('doctor-update');
        Route::get('/delete/{id}', 'DoctorController@delete')->name('doctor-delete');
        Route::post('/destroy/{id}', 'DoctorController@destroy')->name('doctor-destroy');
    });
});
