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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');
    Route::middleware('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('users.index');
        Route::resource('/users', 'Admin\UserController');
        Route::resource('/reportots', 'Admin\ReportOTController', ['only' => ['index', 'show']]);
        Route::get('/users/{id}/reportots/', 'Admin\UserController@showReportOTs')->name('users.reportots.show');
        Route::resource('/absences', 'Admin\AbsenceController', ['only' => ['show', 'index']]);
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::namespace('User')->middleware('ability')->group(function () {
        Route::get('users/{user}/rollcall', 'UserController@rollCall')->name('users.rollcall');
        Route::put('users/{user}/uploadavatar', 'UserController@uploadAvatar')->name('users.upload.avatar');
        Route::resource('users', 'UserController', ['only'=>['show','edit','update']]);
    });
    Route::resource('rollcalls', 'RollCallController', ['only'=>['store','index']]);
    Route::resource('reports', 'ReportController');
    Route::resource('reportots', 'ReportOTController');
    Route::resource('absences', 'AbsenceController');
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
