<!DOCTYPE html>
<html>
<head>
    <style>

        /* .ui.table tr td { 
            border-top: 0px !important; 
        } */

        .myPre {
            font-family: "Helvetica";
            display: flex;
            white-space: pre-line;
            word-break: break-word;
            font-size: 16px;
            /* overflow: hidden;
            margin: 0 auto; */
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div id = "employerViewStudentDetail" class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
            <div class="ui container segment">
                <table class = "ui very basic table">
                <tbody>
                    <tr>
                        <td>
                        <img style="height: 110px; border:2px solid grey; width:120px" src = "{{$student->profilePic}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Student Name</h3>
                            <div class="myPre">{{$student->name}}</div>
                        </td>
                        <td>
                            <h3>Student ID</h3>
                            <div class="myPre">{{$student->studentID}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <h3>Email Address</h3>
                            <div class="myPre">{{$student->email}}</div>
                        </td>
                        <td >
                            <h3>Contact No.</h3>
                            <div class="myPre">{{$student->mobileNo}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h3>Course</h3>
                            <div class="myPre">{{$student->course}}</div>
                        </td>
                        <td>
                            <h3>CGPA</h3>
                            <div class="myPre">{{$student->cgpa}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Address</h3>
                            <div class="myPre">{{$student->address}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Education</h3>
                            <div class="myPre">{{$student->education}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Achievement</h3>
                            <div class="myPre">{{$student->achievement}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Club / Society</h3>
                            <div class="myPre">{{$student->clubSociety}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Skills</h3>
                            <div class="myPre">{{$student->skills}}</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        @if($student->resume != null)
                            <div class = "field">
                                <a href="/download/downloadFile{{$student->resume}}"><h3><u>Resume_pdf</u></h3></a>
                            </div>
                        @else
                            <div class = "field"><b>No Resume Uploaded</b>
                            </div>
                        @endif
                        <td>
                    </tr>
                </tbody>
            </table>
         </div>
    </div>
</body>
<script>
    // var msg = '{{Session::get('alert')}}';
    // var exist = '{{Session::has('alert')}}';
    // if(exist){
    //     alert(msg);
    // }
</script>