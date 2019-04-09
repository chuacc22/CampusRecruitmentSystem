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

class EmployerController extends Controller
{
    public function getEmployerList()
    {
        if((Session::get('role'))=='admin'){
            $employers = Employer::get();
            return view('/admin/adminManageEmployer')->with('employers', $employers);        
        }
    }

    public function getEmployerDetail($id)
    {
        if((Session::get('role'))=='admin'){
            
            $employer = Employer::find($id);
            $applications = Application::where('employerID',$id)->get();
            $appliedStudents = collect();
            
            foreach($applications as $data){
                $appliedStudent = Student::find($data->stuID);
                $appliedStudents->push($appliedStudent);
            }

            return view('/admin/adminViewEmployerDetail')->with('employer',$employer)
                                                        ->with('applications',$applications)
                                                        ->with('appliedStudents',$appliedStudents);
        }
    }

    public function adminUpdateEmployerStatus(Request $request, $id){
        if((Session::get('role'))== "admin"){

            $employer = Employer::find($id);
            if($request->status == 1){
                $employer->status =1;
            }else if($request->status == 0){
                $employer->status = 0;
            }
            $employer->update();

                return back()->with('alert', "Employer Status Updated");
        }
    }
}
