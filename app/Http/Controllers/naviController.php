<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class naviController extends Controller
{
    
    function studentMyJob(){
        return view('student.studentMyJob');
    }

    function studentInbox(){
        return view('student.studentInbox');
    }

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
        return view('employer.employerInbox');
    }

    function employerPostJob(){
        return view('employer.employerPostJob');
    }
    
    function employerUpdateProfile(){
        return view('employer.employerUpdateProfile');
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
