<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Inbox;
use App\Student;
use App\Employer;
use App\Admin;

class InboxController extends Controller{
    public function getStudentInbox($id){

        if((Session::get('role'))=='student'){
            $student = Student::find(Session::get('id'));
            $inbox = Job::find($id);
            $employerID = $job->employerID;
            $employer = Employer::find($employerID);

            return view('/student/studentApplication')->with('job',$job)->with('student',$student)->with('employer',$employer);
        }

    }

    public function getStudentInboxList(){

        //roleSent : for admin = 1, employer = 2, student = 3

        if((Session::get('role'))=='student'){
            $stuID = Session::get('id');
            $inboxs = Inbox::where('stuID', $stuID)->get();
            $inboxList = collect();
            $admins = collect();
            $employers = collect();
            $senders = collect();
            $sendersEmployer = collect();
            $sendersEmployerId = collect();
            $sendersAdmin = collect();
            $sendersAdminId = collect();

            foreach ($inboxs as $data){
                if($data->employerID != 0){
                    $employer = Employer::find($data->employerID);
                    $employers->push($employer);
                }
            }

            if ($employers != null){
                foreach ($employers as $key => $data){
                    $employerID = $data->id;
                    if(!($sendersEmployerId->contains($employerID))){
                        $sendersEmployerId->push($employerID);
                        $employer = Employer::find($data->id);
                        $sendersEmployer->push($employer);
                        // return view('/student/studentInbox')->with('alert','okay');
                    }
                }
            }

            foreach ($inboxs as $data){
                if($data->adminID != 0){
                    $admin = Admin::find($data->adminID);
                    $admins->push($admin);
                }
            }

            if ($admins != null){
                foreach ($admins as $key => $data){
                    $adminID = $data->id;
                    if(!($sendersAdminId->contains($adminID))){
                        $sendersAdminId->push($adminID);
                        $admin = Admin::find($data->id);
                        $sendersAdmin->push($admin);
                        // return view('/student/studentInbox')->with('alert','okay');
                    }
                }
            }

            return view('/student/studentInbox')->with('sendersEmployer',$sendersEmployer)->with('inboxs',$inboxs)->with('sendersAdmin',$sendersAdmin);
        }
        // return view('/student/studentInbox')->with('alert','all not passing');
        // return redirect()->route('studentInbox.navi')->with('alert', 'passing1');

    }
}





//extra

            // foreach ($inboxs as $data){
            //     if($data->adminID == '0'){
            //         $employer = Employer::find($data->employerID);
            //         $employers->push($employer);
            //     }else if($data->employerID == '0'){
            //         $admin = Admin::find($data->adminID);
            //         $admins->push($admin);
            //     }
            // }

            // if ($admins != null){
            //     foreach ($admins as $data){
            //         if(!($sendersAdmin->contains($data->id))){
            //             $admin = Admin::find($data->id);
            //             $sendersAdmin->push($admin);
            //         }
            //     }
            // }

            // foreach ($inboxList as $data){
            //     if($data->adminID = 0){
            //         $employer = $data->employerID;
            //         $employers->push($employer);
            //     }else if($data->employerID = 0){
            //         $admin = $data->adminID;
            //         $admins->push($admin);
            //     }
            // }

            // foreach ($inboxList as $data){
            //     if($data->adminID == 0){
            //             $employer = Employer::find($data->employerID);
            //             $senders->push($employer);
            //         }else if($data->employerID == 0){
            //             $admin = Admin::find($data->adminID);
            //             $senders->push($admin);
            //         }
            // }