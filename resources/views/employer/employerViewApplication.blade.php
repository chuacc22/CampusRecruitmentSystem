<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
        <div id = "employerViewApplication" class="ui container">
                <div class="ui raised very padded text container segment">
                <h2 class = "ui diving header">Application</h2>
                    <div class = "field">
                    <b> To: </b>
                    <a href="/employer/employerViewStudentDetail/{{$student->id}}">{{$student->name}} ({{$student->email}})</a>
                    </div>
                    <div class = "field">
                    <b> From: </b>
                    {{$employer->name}} ({{$employer->email}}) - {{$employer->companyName}}
                    </div>
                    <div class = "ui segment">
                        <b>Application Description :</b>
                        <pre class="myPre">{{$application -> applyDesc}}</pre>
                    </div>
                    <div class = "field">
                        <a href="/employer/employerDownloadPDF{{$application->pdfFile}}"><u>Other Attachments</u></a>
                    </div>
                    <div class = "field">
                        <a href="/employer/employerDownloadResume{{$application->resume}}"><u>Resume</u></a>
                    </div>
                    <form method="get" action="/employer/employerReplyStudentInbox/{{$student->id}}">
                        {{ csrf_field() }}
                        <button class="ui left foated blue large button" type="submit">
                        Reply Message
                        </button>
                    </form>
                </div>
        </div>
    </div>
</body>
<script>
</script>