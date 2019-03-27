<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Student;
use App\Employer;
use App\Job;
use App\Application;

class ApplicationController extends Controller
{
    public function getApplicationDetails($id){

        if((Session::get('role'))=='student'){
            $student = Student::find(Session::get('id'));
            $job = Job::find($id);
            $employerID = $job->employerID;
            $employer = Employer::find($employerID);

            return view('/student/studentApplication')->with('job',$job)->with('student',$student)->with('employer',$employer);
        }

    }

    public function sendApplication(Request $request,$id){

        if((Session::get('role'))=='student'){

            $job = Job::find($id);
            $employer = Employer::find($job->employerID);
            $appliedJob = Application::where('jobID', $id)->first();

            if($appliedJob){
                return redirect()->route('searchedCompany',$id)->with('alert', 'Already applied, processing');
            }else{
                $application = new Application;
                $application->fill($request->all());
                $application->jobID = $id;
                $application->stuID = Session::get('id');
                $application->employerID = $job->employerID;
                $application->stuAppStatus = 1; //1 for applying, 
                $application->empAppStatus = 1; //1 for applying, 2 for read, 3 for interview, 4 for reviewing, 5 for succcess
                $application->save();
    
                return redirect()->route('searchedCompany',$id)->with('alert', 'Application Sent!!!!!!!!');
            }
        }
    }

    public function getApplicationList(Request $request){
        
        if((Session::get('role'))== "student"){
            $stuID = Session::get('id');
            $applications = Application::where('stuID', $stuID)->get();
            $employers = collect();

            foreach($applications as $data){
                $employer = Employer::find($data->employerID);
                $employers->push($employer);
            }
            return view('/student/studentMyJob')->with('applications',$applications)->with('employers', $employers);

        } else if((Session::get('role'))== "employer"){
            $employerID = Session::get('id');
            $applications = Application::where('employerID', $employerID)->get();
            $students = collect();

            foreach($applications as $data){
                $student = Student::find($data->stuID);
                $students->push($student);
            }
            return view('/employer/employerApplicationList')->with('applications',$applications)->with('students', $students);
        }
    }
    
    public function getStudentProfile($id){

        if((Session::get('role'))== "employer"){
            $applications = Application::where('employerID', Session::get('id'))->get();

            foreach($applications as $values){
                if($values->stuID == $id){
                    $student = Student::find($id);
                    return view('/employer/viewStudentProfile')->with('student', $student);
                }
            }
        }else  
            return back()->with('alert', 'Permission denied');
    }

    public function updateApplicationStatus(){
        if((Session::get('role'))=="employer"){
            
        }
    }
}
