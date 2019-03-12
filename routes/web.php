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
    return view('student/companyPage');
});

// Route::get('/', function () {
//     return view('authentication/studentLogin');
// });

Auth::routes();

//login authentication
Route::post('/login/checkLogin', 'Authentication\LoginController@checkStudentLogin');
// Route::post('/login/checkLogin', 'Authentication\LoginController@checkLogin');
// Route::post('/login/checkLogin', 'Authentication\LoginController@checkLogin');

Route::post('/login/checkEmployerLogin', 'Authentication\LoginController@checkEmployerLogin');

Route::get('/login/logout', 'Authentication\LogoutController@logout');

//loginNavi
Route::get('/authentication/studentLogin', 'naviController@studentLogin') -> name('studentLogin.navi');
Route::get('/authentication/employerLogin', 'naviController@employerLogin') -> name('employerLogin.navi');
Route::get('/authentication/adminLogin', 'naviController@adminLogin') -> name('adminLogin.navi');



Route::get('/login/adminLogin', 'Authentication\LoginController@checkLogin');

// Route::get('/division/create', 'DivisionController@create')->name('division.create');
// Route::post('/division', 'DivisionController@store')->name('division.store');

//SEARCH
Route::get('/searchedResult', 'SearchController@search') -> name('searchedResult');


Route::get('/student/studentUpdateProfile', 'naviController@studentUpdateProfile') -> name('studentUpdateProfile.navi');
Route::get('/student/studentMyJob', 'naviController@studentMyJob') -> name('studentMyJob.navi');
Route::get('/student/studentInbox', 'naviController@studentInbox') -> name('studentInbox.navi');
Route::get('/student/searchedResult', 'naviController@searchedResult') -> name('searchedResult.navi');
Route::get('/employer/employerInbox', 'naviController@employerInbox') -> name('employerInbox.navi');
Route::get('/employer/employerPostJob', 'naviController@employerPostJob') -> name('employerPostJob.navi');
Route::get('/employer/employerUpdateProfile', 'naviController@employerUpdateProfile') -> name('employerUpdateProfile.navi');
