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

Route::get('/', function(){
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    Route::get('', 'HomeController@userProfile')->name('profile');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('home', 'HomeController');
    Route::resource('permissions', 'PermissionController');
    Route::get('/home', 'UserController@index')->name('Home');
    Route::post('/showUserInRole', 'UserController@showUserInRole');
    Route::post('update_profile', 'HomeController@updateUserProfile')->name('update-profile');
});

Route::post('/register', 'HomeController@userRegister')->name('user-register');
Route::get('/dangki', 'HomeController@getViewUserRegister')->name('user-dangki');