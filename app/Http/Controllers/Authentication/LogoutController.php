<?php

namespace App\Http\Controllers\Authentication;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    function logout(){
        Session::forget('email');
        if (Session::get('role')=="student"){
            Session::forget('firstName');
            Session::forget('lastName');
            Session::forget('id');
            Session::forget('role');
            return view('/authentication/studentLogin');
        }else if (Session::get('role')=="employer"){
            Session::forget('firstName');
            Session::forget('lastName');
            Session::forget('id');
            Session::forget('role');
            return view('/authentication/employerLogin');
        }else{
            Session::forget('role');
            return view('/authentication/adminLogin');
        }
        
    }
}
