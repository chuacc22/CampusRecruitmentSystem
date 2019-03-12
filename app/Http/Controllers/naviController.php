<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class naviController extends Controller
{
    function studentUpdateProfile(){
        return view('student.studentUpdateProfile');
    }
    
    function studentMyJob(){
        return view('student.studentMyJob');
    }

    function studentInbox(){
        return view('student.studentInbox');
    }

    function searchedResult(){
        $job = null;
        return view('student.searchedResult', compact('job'));
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
