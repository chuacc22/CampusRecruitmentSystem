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
    return view('student/studentFindJob');
});

// Route::get('/division/create', 'DivisionController@create')->name('division.create');
// Route::post('/division', 'DivisionController@store')->name('division.store');

Route::get('/student/studentUpdateProfile', 'naviController@studentUpdateProfile') -> name('studentUpdateProfile.navi');
Route::get('/student/studentMyJob', 'naviController@studentMyJob') -> name('studentMyJob.navi');
Route::get('/student/studentInbox', 'naviController@studentInbox') -> name('studentInbox.navi');
Route::get('/student/studentFindJob', 'naviController@studentFindJob') -> name('studentFindJob.navi');
Route::get('/employer/employerInbox', 'naviController@employerInbox') -> name('employerInbox.navi');
Route::get('/employer/employerPostJobx', 'naviController@employerPostJob') -> name('employerPostJob.navi');
Route::get('/employer/employerUpdateProfile', 'naviController@employerUpdateProfile') -> name('employerUpdateProfile.navi');
