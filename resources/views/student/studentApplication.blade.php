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
        @include('layout.navigation')
        <div id = "studentApplication" class="ui container">
            <form class = "ui form" method="post" action="/student/studentApplication/{{$job->id}}">
                {{ csrf_field() }}
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
                    <div class = "field">
                        <textarea name = "applyDesc"></textarea>
                    </div>
                    <div class = "field">
                        <label>Other Attachment<label>
                        <input type = "file" name="pdfFile">
                    </div>
                    <div class = "field">
                        <label>Resume</label>
                        <input type = "file" name="resumePDF">
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                        Send
                    </button>
                </div>
            </form>
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