<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Inbox;
use App\Student;
use App\Employer;
use App\Admin;

class InboxControllerEmployer extends Controller{

    public function getEmployerInboxFromAdmin($id){

        if((Session::get('role'))=='employer'){
            $inboxContents = Inbox::where('employerID',Session::get('id'))->where('adminID',$id)->orderby('created_at','desc')->get();
            $admin = Admin::find($id);

            return view('/employer/employerReplyAdminInbox')->with('admin',$admin)->with('inboxContents', $inboxContents);
        }
    }

    public function getEmployerInboxFromStudent($id){

        if((Session::get('role'))=='employer'){
            $inboxContents = Inbox::where('employerID',Session::get('id'))->where('stuID',$id)->orderby('created_at','desc')->get();
            $student = Student::find($id);

            return view('/employer/employerReplyStudentInbox')->with('student',$student)->with('inboxContents', $inboxContents);
        }
    }

    public function getEmployerInboxList(){

        //roleSent : for admin = 1, employer = 2, student = 3

        if((Session::get('role'))=='employer'){
            $employerID = Session::get('id');
            $inboxs = Inbox::where('employerID', $employerID)->orderby('created_at','desc')->get();
            $admins = collect();
            $students = collect();
            $senders = collect();
            $sendersStudent = collect();
            $sendersStudentId = collect();
            $sendersAdmin = collect();
            $sendersAdminId = collect();

            foreach ($inboxs as $data){
                if($data->stuID != 0){
                    $student = Student::find($data->stuID);
                    $students->push($student);
                }
            }

            if ($students != null){
                foreach ($students as $key => $data){
                    $studentID = $data->id;
                    if(!($sendersStudentId->contains($studentID))){
                        $sendersStudentId->push($studentID);
                        $student = Student::find($data->id);
                        $sendersStudent->push($student);
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

            return view('/employer/employerInbox')->with('sendersStudent',$sendersStudent)->with('inboxs',$inboxs)->with('sendersAdmin',$sendersAdmin);
        }
    }

    function employerSendAdminMessage(Request $request, $id){

        if((Session::get('role'))=='employer'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->adminID = $id;
            $inbox->stuID = 0;
            $inbox->employerID = Session::get('id');
            $inbox->roleSent = 2;

            if($request->letterDesc == null){
                return back()->with('alert', 'Please write something');
            }

            if($request->pdfFile == null){
                $inbox->pdfFile = null;
            }else{
                $file = $request->file('pdfFile');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $inbox->pdfFile = '/files/' . $filename; 
            }

            $inbox->save();

            return redirect()->route('AdminReplyInbox.emp',$id)->with('alert', 'Message Sent');
        }
    }

    function employerSendStudentMessage(Request $request, $id){

        if((Session::get('role'))=='employer'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->employerID = Session::get('id');
            $inbox->stuID = $id;
            $inbox->adminID = 0;
            $inbox->roleSent = 2;

            if($request->letterDesc == null){
                return back()->with('alert', 'Please write something');
            }

            if($request->pdfFile == null){
                $inbox->pdfFile = null;
            }else{
                $file = $request->file('pdfFile');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $inbox->pdfFile = '/files/' . $filename; 
            }
            
            $inbox->save();

            return redirect()->route('StudentReplyInbox.emp',$id)->with('alert', 'Message Sent');
        }
    }
}
