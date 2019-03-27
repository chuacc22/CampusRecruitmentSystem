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
            <div class="ui container segment" id = "MyJob">
                <table class="ui celled stripped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Applicant Name</th>
                            <th>Course / Programme</th>
                            <th class ="three wide">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($applications as $value)
                        <tr>
                            <td>12/2/2019</td>
                        <td><a href="/employer/viewStudentProfile/{{$students[$i]->id}}">{{$students[$i]->lastName}} {{$students[$i]->firstName}}<a></td>
                            <td>{{$students[$i]->course}}</td>
                            <td>{{$value->stuAppStatus}}</td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>

</script>
