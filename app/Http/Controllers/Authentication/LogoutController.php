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
        Auth::logout();
        return view('/Authentication/login');
    }
}
