<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Job;

class DeleteController extends Controller
{

    public function employerDeleteJob($id){
        $employerID = Session::get('id');
        $job = Job::where('id', $id )->where('employerID', $employerID)->first();
        // $job = Employer::where('employerID', $employer)->first(); 

        if ($job){
            $job->delete();
            return redirect()->route('employerManageJob.navi');
            // return view('/employer/employerViewJob',$job);
        }else             
            return view('/authentication/employerLogin');

    }
}
