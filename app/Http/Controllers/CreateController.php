<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Employer;
use App\Job;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    // function searchStudentProfile(){
    //     $id = Session::get('id');
    //     $student = Student::find($id);
    //     return view('/student/studentUpdateProfile')->with('student',$student);
    // }

    function employerCreateJob(Request $request){
        $id = Session::get('id');
        $role = Session::get('role');

        if($role == "employer"){
            // Job::create(
            // array(
            //         'title' => $request->title,
            //         'companyName' =>  $request->companyName,
            //         'companyWeb' => $request->companyWeb,
            //         'companyRegNo' => $request->companyRegNo,
            //         'jobDesc' => $request->jobDesc,
            //         'requirement' => $request->requirement,
            //         'lookingFor' =>  $request->lookingFor,
            //         'companyOverview' => $request->companyOverview,
            //         'companySnapshot' => $request->companySnapshot,
            //         'address' => $request->address,
            //         'district' => $request->district,
            //         'state' => $request->state,
            //         'contactUs' => $request->contactUs,
            //         'employerID' => $id
            //     )
            // );

            $job = new Job;
            $job->fill($request->all());
            $job->employerId = $id;
            $job->save();
            return redirect()->route('employerManageJob.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }

        // if($role == "employer"){
            
        //     $job = new JOB;

        //     $job = $request->all();

        //     $job->save();

        //     return redirect()->route('employerPostJob.navi');
        // }else{
        //     return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        // }
    }
}
