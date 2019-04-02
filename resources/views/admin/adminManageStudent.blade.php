<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.adminNavi')
        <div id = "adminViewStudent">
            <div class="ui container segment" id = "ManageStudent">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">ID</th>
                            <th>Student Name</th>
                            <th class="three wide">Course</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($students as $values)
                            <tr>
                                <td>{{$values->id}}</td>
                                <td><a href="/admin/adminViewStudentDetail/{{$values->id}}">{{$values->name}}</td>
                                <td>{{$values->course}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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