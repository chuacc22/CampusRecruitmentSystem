<?php

namespace App\Http\Controllers\Authentication;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Employer;
use App\Admin;
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
                Session::put('name', $student->name);
                Session::put('role', 'student');
                return redirect('/student/searchedResult');
            }else{
                return back()->with('error', 'Invalid User or Password');
            }
        }else {
            return back()->with('error', 'Invalid User or Password');
        }
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
                Session::put('name', $employer->name);
                Session::put('role', 'employer');
                return redirect('/employer/employerManageJob');
            }else{
                return back()->with('error', 'Invalid User or Password');
            }
        }else {
            return back()->with('error', 'Invalid User or Password');
        }
    }

    function checkAdminLogin(Request $request){

        $this -> validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $admin = Admin::where('email', $request->email)->first(); 

        if($admin){
            if($request->password==$admin->password){
                //set session
                Session::put('email' , $admin->email);
                Session::put('id', $admin->id);
                Session::put('name', $admin->name);
                Session::put('role', 'admin');
                return redirect('/admin/adminManageEmployer');
            }else{
                return back()->with('error', 'Invalid Admin user or Password');
            }
        }else {
            return back()->with('error', 'Invalid Admin user or Password');
        }
    }

}
