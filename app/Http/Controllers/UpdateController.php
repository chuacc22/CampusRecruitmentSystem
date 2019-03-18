<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;
use App\Student;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    function searchStudentProfile(){
        $id = Session::get('id');
        $student = Student::find($id);
        // $student['student'] = DB::select('select * from students where id = ? ', [$id]);
        return view('/student/studentUpdateProfile')->with('student',$student);
    }

    function updateStudentProfile(Request $request){
        $id = Session::get('id');
        $student = Student::find($id);
        // $student['student'] = DB::select('select * from students where id = ? ', [$id]);

        if($student){
            DB::Table('students')->where('id',$id)->update(
            array(
                    'firstName' =>  $request->firstName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'mobileNo' => $request->mobileNo,
                    'address' => $request->address,
                    'course' =>  $request->course,
                    'cgpa' => $request->cgpa,
                    'achievement' => $request->achievement,
                    'clubSociety' => $request->clubSociety,
                    'skills' => $request->skills,
                    'resume' => $request->resume,
                )
            );
            return redirect()->route('studentUpdateProfile.navi');
        }else{
            return $result = array('msg' => 'User Not Found !! ', 'error' => true);
        }

        // $student->update($request->all());

        // return redirect() -> route('student.searchedResult');  
        // return response()->json(null,204);
  
    }
}
