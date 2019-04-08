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
        @include('layout.adminNavi')
        <div id = "adminViewApplication" class="ui container">
                <div class="ui raised very padded text container segment">
                <h2 class = "ui diving header">Application</h2>
                    <div class = "field">
                    <b> To: </b>
                    {{$employer->name}} ({{$employer->email}}) - {{$employer->companyName}}
                    </div>
                    <div class = "field">
                    <b> From: </b>
                    {{$student->name}} ({{$student->email}})
                    </div>
                    <div class = "ui segment">
                        <h3>Application Description :</h3>
                        <pre class="myPre">{{$application -> applyDesc}}</pre>
                    </div>
                    <div class = "field">
                        <label>Other Attachment<label>
                    </div>
                    <div class = "field">
                        <label>Resume</label>
                    </div>
                    <div>
                        <form method="get" action="/admin/adminReplyStudentInbox/{{$student->id}}">
                            {{ csrf_field() }}
                            <button class="fluid ui orange  button" type="submit">
                                Send Message to Student
                            </button>
                        </form>
                    </div><br>
                    @if($application->showApplication=0)
                    <div>
                        <form method="post" action="/admin/updateShowApplicationStatus/{{$application->id}}" >
                            {{ csrf_field() }}
                            <button class="fluid ui green button" type="submit">
                                Send Application to Employer
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
        </div>
    </div>
</body>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>