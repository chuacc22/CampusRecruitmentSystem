<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Admin;
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
        $existingResume = $student->resume;
        $existingProfilePic= $student->profilePic;

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

            if($request->resume == null){
                $student->resume = $existingResume;
            }else{
                $file = $request->file('resume');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $student->resume = '/files/' . $filename; 
            }

            if($request->profilePic == null){
                $student->profilePic = $existingProfilePic;
            }else{
                $file = $request->file('profilePic');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $student->profilePic = '/files/' . $filename; 
            }

            $student->update();
            return redirect()->route('studentUpdateProfile.navi')->with('alert','Profile Updated');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function updateStudentPassword(Request $request){
        $id = Session::get('id');
        $student = Student::find($id);
        

        if($student){
            if(Session::get('role')== 'student'){
                if($request->oldPassword == $student->password){
                    if($request->password == $request->checkPassword){
                        $student->fill($request->all());
                        $student->update();
                        return redirect()->route('studentUpdateProfile.navi')->with('alert','Password Updated');
                    }else
                        return redirect()->route('studentUpdateProfile.navi')->with('alert','New password not match');
                }else
                    return redirect()->route('studentUpdateProfile.navi')->with('alert','Wrong Password');
            }
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
        $existingProfilePic = $employer->profilePic;

        if($employer){
            $employer->fill($request->all());
            if($request->profilePic == null ){
                $employer->profilePic = $existingProfilePic;
            }else{
                $file = $request->file('profilePic');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('images', $filename);
                $employer->profilePic = '/images/' . $filename;

            }
            $employer->update();


            return redirect()->route('employerUpdateProfile.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function updateEmployerPassword(Request $request){
        $id = Session::get('id');
        $employer = Employer::find($id);
        

        if($employer){
            if(Session::get('role')== 'employer'){
                if($request->oldPassword == $employer->password){
                    if($request->password == $request->checkPassword){
                        $employer->fill($request->all());
                        $employer->update();
                        return redirect()->route('employerUpdateProfile.navi')->with('alert','Password Updated');
                    }else
                        return redirect()->route('employerUpdateProfile.navi')->with('alert','New password not match');
                }else
                    return redirect()->route('employerUpdateProfile.navi')->with('alert','Wrong Password');
            }
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
        $existingLogo = $job->companyLogo;
        // $job = Employer::where('employerID', $employer)->first(); 

        if ($job){
            $job->fill($request->all());
            if($request->companyLogo == null ){
                $job->companyLogo = $existingLogo;
            }else{
                $file = $request->file('companyLogo');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('images', $filename);
                $job->companyLogo = '/images/' . $filename;

            }
            return redirect()->route('employerViewJob.navi',$id);
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }
    }

    function updateAdminPassword(Request $request){
        $id = Session::get('id');
        $admin = Admin::find($id);
        

        if($admin){
            if(Session::get('role')== 'admin'){
                if($request->oldPassword == $admin->password){
                    if($request->password == $request->checkPassword){
                        $admin->fill($request->all());
                        $admin->update();
                        return redirect('/admin/adminManageEmployer')->with('alert','Password Updated');
                    }else
                        return redirect()->route('adminUpdatePassword.navi')->with('alert','New password not match');
                }else
                    return redirect()->route('adminUpdatePassword.navi')->with('alert','Wrong Password');
            }
        }
    }

    function adminUpdatePasswordPage(){
        // return view('student.studentMyJob');
        if (Session::has('email')){
            if (Session::get('role')=='admin'){
                return view('/admin/adminUpdatePassword');
            }
        }
        return view('authentication.adminLogin');
    }
}
