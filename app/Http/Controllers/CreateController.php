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
            
            if($request->companyLogo == null ){
                $job->companyLogo = null;
            }else{
                $file = $request->file('companyLogo');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('images', $filename);
                $job->companyLogo = '/images/' . $filename;
            }
            
            $job->save();
            return redirect()->route('employerManageJob.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function adminCreateNewEmployerProfile(Request $request){
        $role = Session::get('role');

        if($role == "admin"){

            $employer = new Employer;
            $employer->fill($request->all());
            if($request->mouStatus == "on"){
                $employer->mouStatus = 1;
            }else {
                $employer->mouStatus = 0;
            }
            $employer->status = 1;
            $employer->save();
            return redirect()->route('adminManageEmployer.navi')->with('alert','Employer Profile Created');
        }else{
            return back()->with('alert','Not Permitted');
        }
    }

    function adminCreateEmployer(){

        // return view('student.studentMyJob');
        if (Session::has('email')){
            if (Session::get('role')=='admin'){
                return view('/admin/adminCreateNewEmployerProfile');
            }
        }
        return view('authentication.adminLogin');
    }
}
