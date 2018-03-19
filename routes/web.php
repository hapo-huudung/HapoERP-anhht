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
        Route::put('users/{user}/uploadavatar', 'UserController@uploadAvatar')->name('users.upload.avatar');
        Route::resource('users', 'UserController', ['only'=>['show','edit','update']]);
    });
    Route::middleware('level')->namespace('User')->group(function () {
        Route::prefix('user/manage')->group(function (){
            Route::get('/', 'ManageController@index')->name('users.manage');
            Route::get('show/{user}', 'ManageController@userShow')->name('users.manage.user.show');
        });
        Route::prefix('department/manage')->group(function (){

        });

    });
    Route::resource('reports', 'ReportController');
    Route::resource('reportots', 'ReportOTController');
    Route::resource('absences', 'AbsenceController');

    Route::middleware('departments')->prefix('users/departments')->namespace('Department')->group(function () {
        Route::get('{id}', 'UserController@index')->name('users.departments');
//
        Route::middleware('create')->group(function () {
            Route::get('{id}/select', 'UserController@select')->name('users.departments.select');
            Route::get('{id}/create/{member}', 'UserController@create')->name('users.departments.create');
            Route::post('{id}', 'UserController@store')->name('users.departments.store');
        });
//
        Route::middleware('edit')->group(function () {
            Route::get('{id}/edit/{member}', 'UserController@edit')->name('users.departments.edit');
            Route::put('{id}/{member}', 'UserController@update')->name('users.departments.update');
        });
//
        Route::middleware('delete')->group(function () {
            Route::delete('{id}/{member}', 'UserController@destroy')->name('users.departments.destroy');
        });
//
        Route::middleware('read')->group(function () {
            Route::get('{id}/show/{member}', 'UserController@show')->name('users.departments.show');
        });
        Route::middleware('baned')->group(function () {
            Route::get('{id}/restore/{member}', 'UserController@restore')->name('users.departments.restore');
            Route::get('{id}/baned', 'UserController@baned')->name('users.departments.baned');
        });
    });
});
