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
            $student=Student::find(Session::get('id'));
            $exisitngResume = $student->resume;

            // if($appliedJob){
            //     
            // }else{
            if(!$appliedJob || $appliedJob->applicationStatus == 7){

                $application = new Application;
                $application->fill($request->all());
                $application->jobID = $id;
                if($employer->mouStatus == 1){
                    $application->mouStatus = 1;
                    $application->showApplication = 0;
                }else {
                    $application->mouStatus = 0;
                    $application->showApplication = 1;
                }
                if($request->resume == null){
                    if($exisitngResume){
                        $application->resume = $student->resume;
                    }else{
                        $application->resume = null;
                    }
                }else{
                    $file = $request->file('resume');
                    $filename = str_replace(' ', '_', $file->getClientOriginalName());
                    $file->move('files', $filename);
                    $application->resume = '/files/' . $filename;

                }

                if($request->pdfFile == null){
                    $application->pdfFile = null;
                }else{
                    $file = $request->file('pdfFile');
                    $filename = str_replace(' ', '_', $file->getClientOriginalName());
                    $file->move('files', $filename);
                    $application->pdfFile = '/files/' . $filename; 
                }

                $application->stuID = Session::get('id');
                $application->employerID = $job->employerID;
                $application->applicationStatus = 1; //1 for applying, 2 for read, 3 for interview, 4 for reviewing, 5 for succcess
                $application->save();
    
                return redirect()->route('searchedCompany.navi',$id)->with('alert', 'Application Sent');
            }else{
                return redirect()->route('searchedCompany.navi',$id)->with('alert', 'Already applied, processing');
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
            $applications = Application::where('employerID', $employerID)->where('showApplication', 1)->get();
            $students = collect();

            foreach($applications as $data){
                $student = Student::find($data->stuID);
                $students->push($student);
            }
            return view('/employer/employerApplicationList')->with('applications',$applications)->with('students', $students);
        }
    }

    public function getNewSpecialApplicationList(Request $request){

        if((Session::get('role'))== "admin"){
            $applications = Application::where('mouStatus',1)
                                    ->where('showApplication', 0)
                                    ->where('applicationStatus', '!=', 7)
                                    ->orderby('updated_at','desc')->get();
            $employers = collect();
            $students = collect();

            foreach($applications as $data){
                    $employer = Employer::find($data->employerID);
                    $employers->push($employer);
                    $student = Student::find($data->stuID);
                    $students->push($student);
            }
            return view('/admin/adminViewNewSpecialList')->with('applications',$applications)
                                                        ->with('employers',$employers)
                                                        ->with('students', $students);
        }
    }
    public function getSentSpecialApplicationList(Request $request){
        
        if((Session::get('role'))== "admin"){
                $applications = Application::where('mouStatus',1)->where('showApplication', 1)->orderby('updated_at','desc')->get();
                $employers = collect();
                $students = collect();
    
                foreach($applications as $data){
                    $employer = Employer::find($data->employerID);
                    $employers->push($employer);
                    $student = Student::find($data->stuID);
                    $students->push($student);
                }
                return view('/admin/adminViewSentSpecialList')->with('applications',$applications)
                                                            ->with('employers',$employers)
                                                            ->with('students', $students);
        }
    }

    public function getRejectedApplicationList(Request $request){
        
        if((Session::get('role'))== "admin"){
                $applications = Application::where('applicationStatus', 7)->orderby('updated_at','desc')->get();
                $employers = collect();
                $students = collect();
    
                foreach($applications as $data){
                    $employer = Employer::find($data->employerID);
                    $employers->push($employer);
                    $student = Student::find($data->stuID);
                    $students->push($student);
                }
                return view('/admin/adminViewSentSpecialList')->with('applications',$applications)
                                                            ->with('employers',$employers)
                                                            ->with('students', $students);
        }
    }

    public function getApplicationContent($id){

        if((Session::get('role')=="employer")){
            $application = Application::find($id);
            if($application->employerID == Session::get('id')){
                $employer = Employer::find(Session::get('id'));
                $student = Student::find($application->stuID);
                return view('/employer/employerViewApplication')->with('application',$application)
                                                                ->with('employer', $employer)
                                                                ->with('student', $student);
            }else return back()->with('alert',"Invalid View !");

        }else if((Session::get('role')=='admin')){
            $application = Application::find($id);
            $employer = Employer::find($application->employerID);
            $student = Student::find($application->stuID);
            return view('/admin/adminViewApplication')->with('application',$application)
                                                            ->with('employer', $employer)
                                                            ->with('student', $student);
        
        }else 
            return view('/authentication/employerLogin')->with('alert', "Invalid User Type");
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

    public function updateApplicationStatus(Request $request, $id){
        if((Session::get('role'))=="employer"){
            if($request->applicationStatus == 0){
                return back()->with('alert','Please select a status'); 
            }else {
                $application = Application::find($id);
                $application->fill($request->all());
                $application->update();
                return back()->with('alert','status updated');
            }
        }
    }

    public function updateShowApplicationStatus(Request $request, $id){
        if((Session::get('role'))=="admin"){
            $application = Application::find($id);
            $application->showApplication = 1;
            $application->update();
            return redirect()->route('adminViewNewSpecialList.navi',$id)->with('alert','Application Sent to the Employer');
        }
    }

    public function adminUpdateApplicationStatus(Request $request, $id){
        if((Session::get('role'))=='admin'){
            $application = Application::find($id);
            $application->showApplication = 0;
            $application->applicationStatus = 7;
            $application->update();
            return redirect()->route('adminViewApplication.navi',$id)->with('alert','Student Application Rejected');
        }
    }
}
