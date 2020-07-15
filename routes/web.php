<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::resource('projects', 'ProjectController');
    Route::resource('positions', 'PositionController');
    Route::resource('jobs', 'JobController');
    Route::prefix('ung-vien')->group(function(){
        Route::get('danh-sach-ung-vien', 'CandidateController@index');
    });
    Route::get('/home', 'UserController@index')->name('Home');
    Route::post('/showUserInRole', 'UserController@showUserInRole');
    Route::post('update_profile', 'HomeController@updateUserProfile')->name('update-profile');
    Route::post('update_password', 'HomeController@updatePassword')->name('update-password');
    Route::post('crop_avatar', 'UserController@uploadImage')->name('croppie');
});

Route::post('/dangki', 'CandidateController@store')->name('user-register');
Route::get('/dangki', 'CandidateController@create')->name('candidate-register');
Route::get('/tuyen-dung','HomeController@index')->name('recruitment');