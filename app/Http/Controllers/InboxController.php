<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Inbox;
use App\Student;
use App\Employer;
use App\Admin;

class InboxController extends Controller{

    public function getStudentInboxFromEmployer($id){

        if((Session::get('role'))=='student'){
            $inboxContents = Inbox::where('stuID',Session::get('id'))->where('employerID',$id)->orderby('created_at','desc')->get();
            $employer = Employer::find($id);

            return view('/student/studentReplyInbox')->with('employer',$employer)->with('inboxContents', $inboxContents);
        }
    }

    public function getStudentInboxFromAdmin($id){

        if((Session::get('role'))=='student'){
            $inboxContents = Inbox::where('stuID',Session::get('id'))->where('adminID',$id)->orderby('created_at','desc')->get();
            $admin = Admin::find($id);

            return view('/student/studentReplyAdminInbox')->with('admin',$admin)->with('inboxContents', $inboxContents);
        }
    }

    public function getStudentInboxList(){

        //roleSent : for admin = 1, employer = 2, student = 3

        if((Session::get('role'))=='student'){
            $stuID = Session::get('id');
            $inboxs = Inbox::where('stuID', $stuID)->orderby('created_at','desc')->get();
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
                    }
                }
            }

            return view('/student/studentInbox')->with('sendersEmployer',$sendersEmployer)->with('inboxs',$inboxs)->with('sendersAdmin',$sendersAdmin);
        }
    }

    function studentSendEmployerMessage(Request $request, $id){

        if((Session::get('role'))=='student'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->employerID = $id;
            $inbox->stuID = Session::get('id');
            $inbox->adminID = 0;
            $inbox->roleSent = 3;
            $inbox->save();

            return redirect()->route('studentReplyInbox',$id)->with('alert', 'Message Sent');
        }
    }

    function studentSendAdminMessage(Request $request, $id){

        if((Session::get('role'))=='student'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->adminID = $id;
            $inbox->stuID = Session::get('id');
            $inbox->employerID = 0;
            $inbox->roleSent = 3;
            $inbox->save();

            return redirect()->route('studentReplyAdminInbox',$id)->with('alert', 'Message Sent');
        }
    }
}
