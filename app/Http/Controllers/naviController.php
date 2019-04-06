<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Job;

class naviController extends Controller
{
    
    function studentMyJob(){
        // return view('student.studentMyJob');
        if (Session::has('email')){
            if (Session::get('role')=='student'){
                return view('student.studentMyJob');
            }
        }
        return view('authentication.studentLogin');
    }

    // function studentInbox(){
    //     // return view('student.studentInbox');
    //     if (Session::has('email')){
    //         if (Session::get('role')=='student'){
    //             return view('student.studentInbox');
    //         }
    //     }
    //     return view('authentication.studentLogin'); 
    // }

    function searchedResult(){
        if (Session::has('email')){
            if (Session::get('role')=='student'){
                $job = null;
                return view('student.searchedResult', compact('job'));
            }
        }
        return view('authentication.studentLogin');   
    }

    function employerInbox(){
        // return view('employer.employerInbox');
        if (Session::has('email')){
            if (Session::get('role')=='employer'){
                return view('employer.employerInbox');
            }
        }
        return view('authentication.employerLogin'); 
    }

    function employerManageJob(){
        // return view('employer.employerPostJob');
        if (Session::has('email')){
            if (Session::get('role')=='employer'){
                $employerID = Session::get('id');
                $job = Job::where('employerID', '=', $employerID)
                    -> orderBy('title') -> paginate(20);

                return view('employer.employerManageJob', compact('job'));
            }
        }
        return view('authentication.employerLogin'); 
    }
    
    function employerPostJob(){
        // return view('employer.employerUpdateProfile');
        if (Session::has('email')){
            if (Session::get('role')=='employer'){
                return view('employer.employerPostJob');
            }
        }
        return view('authentication.employerLogin'); 
    }

    function employerUpdateProfile(){
        // return view('employer.employerUpdateProfile');
        if (Session::has('email')){
            if (Session::get('role')=='employer'){
                return view('employer.employerUpdateProfile');
            }
        }
        return view('authentication.employerLogin'); 
    }

    function studentLogin(){
        return view('authentication.studentLogin');
    }

    function employerLogin(){
        return view('authentication.employerLogin');
    }

    function adminLogin(){
        return view('authentication.adminLogin');
    }
}
