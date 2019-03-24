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

                Session::put('email' , $student->email);
                Session::put('id', $student->id);
                Session::put('lastName', $student->lastName);
                Session::put('firstName', $student->firstName);
                Session::put('role', 'student');
                return redirect('/student/searchedResult');
            }else{
                return back()->with('error', 'Wrong Password');
            }
        }else {
            return back()->with('error', 'No email exist');
        }
    }

    function successlogin(){
        return view('/student/searchedResult');
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
                Session::put('email' , $employer->email);
                Session::put('id', $employer->id);
                Session::put('lastName', $employer->lastName);
                Session::put('firstName', $employer->firstName);
                Session::put('role', 'employer');
                return redirect('/employer/employerManageJob');
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
