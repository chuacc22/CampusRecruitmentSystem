<?php

namespace App\Http\Controllers\Authentication;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Employer;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    function checkStudentLogin(Request $request){
        
        $this -> validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        // $remember = $request -> get('remember');

        $student = Student::where('email',$request->email)->first(); //return one data


        if($student){
            if($request->password==$student->password){
                //set session
                return redirect('/student/studentFindJob');
            }else{
                return back()->with('error', 'Wrong Password');
            }
        }else {
            return back()->with('error', 'No email exist');
        }
    }

    function successlogin(){
        return view('/student/studentFindJob');
    }

    function checkEmployerLogin(Request $request){

        $this -> validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $employer = Employer::where('email', $request->email)->first(); 

        if($employer){
            if($request->password==$employer->password){
                //set session
                return redirect('/employer/employerPostJob');
            }else{
                return back()->with('error', 'Wrong Password');
            }
        }else {
            return back()->with('error', 'No email exist');
        }
    }

    function successEmployerLogin(){
        return view('/employer/employerPostJob');
    }

}
