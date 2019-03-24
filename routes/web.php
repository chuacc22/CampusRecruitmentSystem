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
    return view('employer/employerManageJob');
});

// Route::get('/', function () {
//     return view('authentication/studentLogin');
// });

Auth::routes();

//login authentication
Route::post('/login/checkLogin', 'Authentication\LoginController@checkStudentLogin');
Route::post('/login/checkEmployerLogin', 'Authentication\LoginController@checkEmployerLogin');
Route::get('/login/adminLogin', 'Authentication\LoginController@checkLogin');
Route::get('/login/logout', 'Authentication\LogoutController@logout');


//loginNavigator
Route::get('/authentication/studentLogin', 'naviController@studentLogin') -> name('studentLogin.navi');
Route::get('/authentication/employerLogin', 'naviController@employerLogin') -> name('employerLogin.navi');
Route::get('/authentication/adminLogin', 'naviController@adminLogin') -> name('adminLogin.navi');




// Route::get('/division/create', 'DivisionController@create')->name('division.create');
// Route::post('/division', 'DivisionController@store')->name('division.store');

//SEARCH
Route::get('/searchedResult', 'SearchController@search') -> name('searchedResult');
Route::get('/student/companyPage/{id}', 'SearchController@searchCompany')-> name('searchedCompany');
Route::get('/employer/employerViewJob/{id}', 'SearchController@employerViewJob') -> name('employerViewJob.navi');

//UpdateStudentProfile
Route::get('/student/studentUpdateProfile', 'UpdateController@searchStudentProfile') -> name('studentSearchProfile.navi');
Route::post('/student/studentUpdateProfile', 'UpdateController@updateStudentProfile') -> name('studentUpdateProfile.navi');

//UpdateEmployerProfile
Route::get('/employer/employerUpdateProfile', 'UpdateController@searchEmployerProfile') -> name('employerSearchProfile.navi');
Route::post('/employer/employerUpdateProfile', 'UpdateController@updateEmployerProfile') -> name('employerUpdateProfile.navi');
//UpdateEmployerJob
Route::get('/employer/employerEditJob/{id}', 'UpdateController@matchJobPage') -> name('matchJobPage.navi');
Route::post('/employer/employerEditJob/{id}', 'UpdateController@employerEditJob') -> name('employerEditJob.navi');

//CreateNewJob
Route::get('/employer/employerPostJob', 'naviController@employerPostJob') -> name('employerPostJob.navi');
Route::post('/employer/employerPostJob', 'CreateController@employerCreateJob') -> name('employerPostJob.navi');

//DeleteJob
Route::delete('/employer/employerDeleteJob/{id}', 'DeleteController@employerDeleteJob') -> name('employerDeleteJob.navi');


Route::get('/student/studentMyJob', 'naviController@studentMyJob') -> name('studentMyJob.navi');
Route::get('/student/studentInbox', 'naviController@studentInbox') -> name('studentInbox.navi');
Route::get('/student/searchedResult', 'naviController@searchedResult') -> name('searchedResult.navi');
Route::get('/employer/employerInbox', 'naviController@employerInbox') -> name('employerInbox.navi');
Route::get('/employer/employerManageJob', 'naviController@employerManageJob') -> name('employerManageJob.navi');
