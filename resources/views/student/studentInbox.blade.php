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
        @include('layout.navigation')
        <div id = "HomePage">
            <div class="ui container segment" id = "studentInbox">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Employer/Company</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($inboxs as $data)
                            <tr>
                                <td>12/2/2019</td>
                                @if($data->employerID != 0)
                                    @foreach($sendersEmployer as $employer)
                                        @if($employer->id == $data->employerID)
                                            <td>{{$employer->companyName}}</td>
                                        @endif
                                    @endforeach
                                @else
                                
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

