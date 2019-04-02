<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Student;
use App\Employer;
use App\Job;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    function searchStudentProfile(){
        $id = Session::get('id');
        $student = Student::find($id);
        return view('/student/studentUpdateProfile')->with('student',$student);
    }

    function updateStudentProfile(Request $request){
        $id = Session::get('id');
        $student = Student::find($id);

        if($student){
            // DB::Table('students')->where('id',$id)->update(
            // array(
            //         'name' => $request->name,
            //         'email' => $request->email,
            //         'mobileNo' => $request->mobileNo,
            //         'address' => $request->address,
            //         'course' =>  $request->course,
            //         'cgpa' => $request->cgpa,
            //         'achievement' => $request->achievement,
            //         'clubSociety' => $request->clubSociety,
            //         'skills' => $request->skills,
            //         'resume' => $request->resume
            //     )
            // );

            $student->fill($request->all());
            $student->update();
            return redirect()->route('studentUpdateProfile.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function searchEmployerProfile(){
        $id = Session::get('id');
        $employer = Employer::find($id);
        return view('/employer/employerUpdateProfile')->with('employer',$employer);
    }

    function updateEmployerProfile(Request $request){
        $id = Session::get('id');
        $employer = Employer::find($id);

        if($employer){
            $employer->fill($request->all());
            $employer->update();

            return redirect()->route('employerUpdateProfile.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function matchJobPage($id){
        $employerID = Session::get('id');
        // $job = Job::find($id);
        $job = Job::where('id', $id )->where('employerID', $employerID)->first();

        if ($job){
            return view('/employer/employerEditJob')->with('job',$job);
        }else             
            return view('/authentication/employerLogin');
    }

    function employerEditJob(Request $request){
        $id = $request->id;
        $employerID = Session::get('id');
        $job = Job::where('employerID', $employerID)->find($id);
        // $job = Employer::where('employerID', $employer)->first(); 

        if ($job){
            $job->fill($request->all());
            $job->update();
            return redirect()->route('employerViewJob.navi',$id);
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }
}
