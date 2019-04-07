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
        @include('layout.employerNavi')
        <div id = "HomePage">
            <div class="ui container segment" id = "employerInbox">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>StudentName</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($inboxs as $data)
                                @if($data->stuID != 0)
                                    @foreach($sendersStudent as $key => $student)
                                        @if($student->id == $data->stuID)
                                            <tr>
                                                <td>{{$data->created_at->format('d/m/Y')}}</td>
                                
                                                <td><a href="/employer/employerReplyStudentInbox/{{$student->id}}">{{$student->name}}</a></td>
                                                <?php 
                                                    $sendersStudent->forget($key);
                                                ?>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach($sendersAdmin as $key => $admin)
                                        @if($admin->id == $data->adminID)
                                            <tr>
                                                <td>{{$data->created_at->format('d/m/Y')}}</td>
                                
                                                <td><a href="/employer/employerReplyAdminInbox/{{$admin->id}}">{{$admin->name}}</a></td>
                                                <?php 
                                                    $sendersAdmin->forget($key);
                                                ?>
                                        @endif
                                    @endforeach
                                @endif
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

