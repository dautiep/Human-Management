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
Route::prefix('tuyen-dung')->group(function(){
    Route::get('','HomeController@index')->name('recruitment');
    Route::get('{slug}/danh-sach-cong-viec', 'HomeController@showJobsInProject')->name('jobs');
    Route::get('{ma_job}/chi-tiet-cong-viec', 'HomeController@showDetailJob')->name('detail-job');
    Route::get('{ma_job}/chi-tiet-cong-viec/ung-tuyen', 'HomeController@showViewApplyJob')->name('apply-job');
    Route::post('{ma_job}/chi-tiet-cong-viec/ung-tuyen', 'HomeController@applyJob')->name('apply');
    Route::post('showDistricts-in-provinces', 'HomeController@showDistrictsInProvince')->name('show-district');
    Route::post('showCommunes-in-districts', 'HomeController@showCommunesInDistrict')->name('show-commune');

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
    Route::resource('detail-jobs', 'DetailJobController');
    Route::resource('education-levels', 'EducationLevelController');
    Route::resource('sources-job', 'SourceJobController');
    Route::resource('interview-status', 'InterviewStatusController');
    Route::resource('interview-result', 'InterviewResultController');
    Route::resource('provinces', 'ProvinceController');
    Route::post('provinces/import-provinces', 'ProvinceController@importProvinces')->name('import-provinces');
    Route::resource('districts', 'DistrictController');
    Route::post('districts/import-districts', 'DistrictController@importDistricts')->name('import-districts');
    Route::resource('communes', 'CommuneController');
    Route::post('communes/import-communes', 'CommuneController@importCommunes')->name('import-communes');
    Route::get('candidates/send-mail/{id}', 'CandidateController@confirmCandidates')->name('confirm');
    Route::post('candidates/send-mail/{id}', 'CandidateController@sendMailInterview')->name('send-mail');
    Route::resource('candidates', 'CandidateController');

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
