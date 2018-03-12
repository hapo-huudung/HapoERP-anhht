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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::namespace('User')->group(function () {
        Route::get('users/rollcall', 'UserController@rollCall')->name('user.rollcall');
        Route::put('users/uploadavatar/{id}', 'UserController@uploadAvatar')->name('users.upload.avatar');
        Route::resource('users', 'UserController');
        Route::resource('reports', 'ReportController');
    });

    Route::middleware('department')->prefix('users/department')->namespace('Department')->group(function () {
        Route::get('{id}', 'UserController@show')->name('user.department.show');
//
        Route::middleware('create')->group(function () {
            Route::get('{id}/create', 'UserController@create')->name('users.department.create');
        });
//
        Route::middleware('update')->group(function () {
            Route::get('{id}/update', 'UserController@update')->name('users.department.update');
        });
//
        Route::middleware('delete')->group(function () {
            Route::get('{id}/delete', 'UserController@delete')->name('users.department.delete');
        });
//
        Route::middleware('read')->group(function () {
            Route::get('{id}/read', 'UserController@read')->name('users.department.read');
        });
    });
});
