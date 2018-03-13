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
    Route::middleware('ability')->namespace('User')->group(function () {
        Route::get('users/{user}/rollcall', 'UserController@rollCall')->name('users.rollcall');
        Route::put('users/{user}/uploadavatar', 'UserController@uploadAvatar')->name('users.upload.avatar');
        Route::resource('users', 'UserController',['only'=>['show','edit','update']]);
    });
    Route::middleware('level')->prefix('user/manage')->namespace('User')->group(function (){
       Route::get('/','ManageController@index')->name('users.manage');
    });
    Route::resource('reports', 'ReportController');
    Route::resource('reportots', 'ReportOTController');
    Route::resource('absences', 'AbsenceController');

    Route::middleware('departments')->prefix('users/departments')->namespace('Department')->group(function () {
        Route::get('{id}', 'UserController@index')->name('users.departments');
//
        Route::middleware('create')->group(function () {
            Route::get('{id}/create', 'UserController@create')->name('users.departments.create');
        });
//
        Route::middleware('update')->group(function () {
            Route::get('{id}/update', 'UserController@update')->name('users.departments.update');
        });
//
        Route::middleware('delete')->group(function () {
            Route::get('{id}/delete', 'UserController@delete')->name('users.departments.delete');
        });
//
        Route::middleware('read')->group(function () {
            Route::get('{id}/read', 'UserController@read')->name('users.departments.read');
        });
    });
});
