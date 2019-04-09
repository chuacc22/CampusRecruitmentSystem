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

// Route::get('/', function () {
//     return view('student/studentApplication');
// });

Route::get('/', function () {
    return view('authentication/studentLogin');
});

Auth::routes();

//login authentication
Route::post('/login/checkLogin', 'Authentication\LoginController@checkStudentLogin');
Route::post('/login/checkEmployerLogin', 'Authentication\LoginController@checkEmployerLogin');
Route::post('/login/checkAdminLogin', 'Authentication\LoginController@checkAdminLogin');
Route::get('/login/logout', 'Authentication\LogoutController@logout');


//loginNavigator
Route::get('/authentication/studentLogin', 'naviController@studentLogin') -> name('studentLogin.navi');
Route::get('/authentication/employerLogin', 'naviController@employerLogin') -> name('employerLogin.navi');
Route::get('/authentication/adminLogin', 'naviController@adminLogin') -> name('adminLogin.navi');




// Route::get('/division/create', 'DivisionController@create')->name('division.create');
// Route::post('/division', 'DivisionController@store')->name('division.store');

//SEARCH
Route::get('/searchedResult', 'SearchController@search') -> name('searchedResult');
Route::get('/student/companyPage/{id}', 'SearchController@searchCompany')-> name('searchedCompany.navi');
Route::get('/employer/employerViewJob/{id}', 'SearchController@employerViewJob') -> name('employerViewJob.navi');

//UpdateStudentProfile
Route::get('/student/studentUpdateProfile', 'UpdateController@searchStudentProfile') -> name('studentSearchProfile.navi');
Route::post('/student/studentUpdateProfile', 'UpdateController@updateStudentProfile') -> name('studentUpdateProfile.navi');
Route::post('/student/studentUpdatePassword', 'UpdateController@updateStudentPassword')-> name('studentUpdatePassword');

//UpdateEmployerProfile
Route::get('/employer/employerUpdateProfile', 'UpdateController@searchEmployerProfile') -> name('employerSearchProfile.navi');
Route::post('/employer/employerUpdateProfile', 'UpdateController@updateEmployerProfile') -> name('employerUpdateProfile.navi');
Route::post('/employer/employerUpdatePassword', 'UpdateController@updateEmployerPassword')-> name('employerUpdatePassword');


//UpdateEmployerJob
Route::get('/employer/employerEditJob/{id}', 'UpdateController@matchJobPage') -> name('matchJobPage.navi');
Route::post('/employer/employerEditJob/{id}', 'UpdateController@employerEditJob') -> name('employerEditJob.navi');

//CreateNewJob
Route::get('/employer/employerPostJob', 'naviController@employerPostJob') -> name('employerPostJob.navi');
Route::post('/employer/employerPostJob', 'CreateController@employerCreateJob') -> name('employerPostJob.navi');

//DeleteJob
Route::delete('/employer/employerDeleteJob/{id}', 'DeleteController@employerDeleteJob') -> name('employerDeleteJob.navi');

//application
Route::get('/student/studentApplication/{id}', 'ApplicationController@getApplicationDetails');
Route::post('/student/studentApplication/{id}', 'ApplicationController@sendApplication');

//MYJOB
Route::get('/student/studentMyJob', 'ApplicationController@getApplicationList') -> name('studentMyJob.navi');

//EmployerApplicationList
Route::get('/employer/employerApplicationList', 'ApplicationController@getApplicationList') -> name('employerApplicationList.navi');
Route::get('/employer/employerViewApplication/{id}', 'ApplicationController@getApplicationContent');
Route::post('/employer/employerUpdateApplicationStatus/{id}', 'ApplicationController@updateApplicationStatus');
Route::get('/employer/employerViewStudentDetail/{id}', 'StudentController@employerViewStudentDetail');

//EmployerViewStudentProfile /employer/viewStudentProfile/
Route::get('/employer/viewStudentProfile/{id}', 'ApplicationController@getStudentProfile');

//Admin
Route::get('/admin/adminManageEmployer', 'EmployerController@getEmployerList')->name('adminManageEmployer.navi');
Route::get('/admin/adminManageStudent', 'StudentController@getStudentList')->name('adminManageStudent.navi');

Route::get('/admin/adminViewStudentDetail/{id}', 'StudentController@getStudentDetail');
Route::get('/admin/adminViewEmployerDetail/{id}', 'EmployerController@getEmployerDetail');
Route::get('/admin/adminViewNewSpecialList', 'ApplicationController@getNewSpecialApplicationList') -> name('adminViewNewSpecialList.navi');
Route::get('/admin/adminViewSentSpecialList', 'ApplicationController@getSentSpecialApplicationList') -> name('adminViewSentSpecialList.navi');
Route::get('/admin/adminViewRejectedList', 'ApplicationController@getRejectedApplicationList') -> name('adminViewRejectList.navi');
Route::get('/admin/adminViewApplication/{id}', 'ApplicationController@getApplicationContent') -> name('adminViewApplication.navi');

//Inbox
Route::get('/student/studentInbox', 'InboxController@getStudentInboxList') -> name('studentInbox.navi');
Route::get('/employer/employerInbox', 'InboxControllerEmployer@getEmployerInboxList') -> name('employerInbox.navi');
Route::get('/admin/adminInbox', 'InboxControllerAdmin@getAdminInboxList') -> name('adminInbox.navi');

//student
Route::get('/student/studentReplyInbox/{id}', 'InboxController@getStudentInboxFromEmployer')-> name('studentReplyInbox');
Route::get('/student/studentReplyAdminInbox/{id}', 'InboxController@getStudentInboxFromAdmin')->name('studentReplyAdminInbox');

Route::post('/student/studentReplyInbox/{id}', 'InboxController@studentSendEmployerMessage');
Route::post('/student/studentReplyAdminInbox/{id}', 'InboxController@studentSendAdminMessage');

//employer
Route::get('/employer/employerReplyAdminInbox/{id}', 'InboxControllerEmployer@getEmployerInboxFromAdmin')-> name('AdminReplyInbox.emp');
Route::get('/employer/employerReplyStudentInbox/{id}', 'InboxControllerEmployer@getEmployerInboxFromStudent')->name('StudentReplyInbox.emp');

Route::post('/employer/employerReplyAdminInbox/{id}', 'InboxControllerEmployer@employerSendAdminMessage');
Route::post('/employer/employerReplyStudentInbox/{id}', 'InboxControllerEmployer@employerSendStudentMessage');

//admin
Route::get('/admin/adminReplyEmployerInbox/{id}', 'InboxControllerAdmin@getAdminInboxFromEmployer')-> name('EmployerReplyInbox.adm');
Route::get('/admin/adminReplyStudentInbox/{id}', 'InboxControllerAdmin@getAdminInboxFromStudent')->name('StudentReplyInbox.adm');

Route::post('/admin/adminReplyEmployerInbox/{id}', 'InboxControllerAdmin@adminSendEmployerMessage');
Route::post('/admin/adminReplyStudentInbox/{id}', 'InboxControllerAdmin@adminSendStudentMessage');

//admin update password
Route::get('/admin/adminUpdatePassword', 'UpdateController@adminUpdatePasswordPage')-> name('adminUpdatePassword.navi');
Route::post('/admin/adminUpdatePassword', 'UpdateController@updateAdminPassword')-> name('adminUpdatePassword');

Route::get('/admin/adminCreateEmployer', 'CreateController@adminCreateEmployer')->name('adminCreateEmployer.navi');
Route::post('/admin/adminCreateNewEmployerProfile', 'CreateController@adminCreateNewEmployerProfile')->name('adminCreateNewEmployerProfile.navi');

//admin send application to employer
Route::post('/admin/updateShowApplicationStatus/{id}', 'ApplicationController@updateShowApplicationStatus');

//admin update application status
Route::post('/admin/adminUpdateApplicationStatus/{id}', 'ApplicationController@adminUpdateApplicationStatus');

//admin change student account status
Route::post('/admin/adminChangeStudentStatus/{id}', 'StudentController@adminUpdateStudentStatus');

//admin change employer account status
Route::post('/admin/adminChangeEmployerStatus/{id}', 'EmployerController@adminUpdateEmployerStatus');

Route::get('/student/searchedResult', 'naviController@searchedResult') -> name('searchedResult.navi');
Route::get('/employer/employerManageJob', 'naviController@employerManageJob') -> name('employerManageJob.navi');

//download
Route::get('/employer/employerDownloadPDF/files/{pdfFile}', function($pdfFile){return response()->download("./files/$pdfFile");});
Route::get('/employer/employerDownloadResume/files/{resume}', function($resume){return response()->download("./files/$resume");});
Route::get('/download/downloadFile/files/{pdfFile}', function($pdfFile){return response()->download("./files/$pdfFile");});
