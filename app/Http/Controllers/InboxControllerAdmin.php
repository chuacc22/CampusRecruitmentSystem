<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Inbox;
use App\Student;
use App\Employer;
use App\Admin;

class InboxControllerAdmin extends Controller{

    public function getAdminInboxFromEmployer($id){

        if((Session::get('role'))=='admin'){
            $inboxContents = Inbox::where('adminID',Session::get('id'))->where('employerID',$id)->orderby('created_at','desc')->get();
            $employer = Employer::find($id);

            return view('/admin/adminReplyEmployerInbox')->with('employer',$employer)->with('inboxContents', $inboxContents);
        }
    }

    public function getAdminInboxFromStudent($id){

        if((Session::get('role'))=='admin'){
            $inboxContents = Inbox::where('adminID',Session::get('id'))->where('stuID',$id)->orderby('created_at','desc')->get();
            $student = Student::find($id);

            return view('/admin/adminReplyStudentInbox')->with('student',$student)->with('inboxContents', $inboxContents);
        }
    }

    public function getAdminInboxList(){

        //roleSent : for admin = 1, employer = 2, student = 3

        if((Session::get('role'))=='admin'){
            $adminID = Session::get('id');
            $inboxs = Inbox::where('adminID', $adminID)->orderby('created_at','desc')->get();
            $employers = collect();
            $students = collect();
            $senders = collect();
            $sendersStudent = collect();
            $sendersStudentId = collect();
            $sendersEmployer = collect();
            $sendersEmployerId = collect();

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

            return view('/admin/adminInbox')->with('sendersStudent',$sendersStudent)->with('inboxs',$inboxs)->with('sendersEmployer',$sendersEmployer);
        }
    }

    function adminSendEmployerMessage(Request $request, $id){

        if((Session::get('role'))=='admin'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->adminID = Session::get('id');
            $inbox->stuID = 0;
            $inbox->employerID = $id;
            $inbox->roleSent = 1;

            if($request->pdfFile == null){
                $inbox->pdfFile = null;
            }else{
                $file = $request->file('pdfFile');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $inbox->pdfFile = '/files/' . $filename; 
            }

            $inbox->save();

            return redirect()->route('EmployerReplyInbox.adm',$id)->with('alert', 'Message Sent');
        }
    }

    function adminSendStudentMessage(Request $request, $id){

        if((Session::get('role'))=='admin'){
            $inbox = new Inbox;
            $inbox->fill($request->all());
            $inbox->adminID = Session::get('id');
            $inbox->stuID = $id;
            $inbox->employerID = 0;
            $inbox->roleSent = 1;

            if($request->pdfFile == null){
                $inbox->pdfFile = null;
            }else{
                $file = $request->file('pdfFile');
                $filename = str_replace(' ', '_', $file->getClientOriginalName());
                $file->move('files', $filename);
                $inbox->pdfFile = '/files/' . $filename; 
            }
            
            $inbox->save();

            return redirect()->route('StudentReplyInbox.adm',$id)->with('alert', 'Message Sent');
        }
    }
}
