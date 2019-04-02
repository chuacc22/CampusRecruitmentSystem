<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Validator;
use Session;
use App\Student;
use App\Employer;
use App\Application;
use App\Job;

class StudentController extends Controller
{
    public function getStudentList()
    {
        if((Session::get('role'))=='admin'){
            $students = Student::get();
            return view('/admin/adminManageStudent')->with('students', $students);        
        }
    }

    public function getStudentDetail($id)
    {
        if((Session::get('role'))=='admin'){
            
            $student = Student::find($id);
            $applications = Application::where('stuId',$id)->get();
            $appliedEmployers = collect();
            $appliedJobs = collect();

            foreach($applications as $data){
                $appliedJob = Job::find($data->jobID);
                $appliedJobs->push($appliedJob);
            }

            foreach($appliedJobs as $data){
                $appliedEmployer = Employer::find($data->employerID);
                $appliedEmployers->push($appliedEmployer);
            }

            return view('/admin/adminViewStudentDetail')->with('student',$student)
                                                        ->with('appliedJobs', $appliedJobs)
                                                        ->with('applications',$applications)
                                                        ->with('appliedEmployers',$appliedEmployers);
        }
    }
}
