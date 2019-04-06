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
                        <td><a href="/employer/employerViewApplication/{{$value->id}}">{{$students[$i]->name}}<a></td>
                            <td>{{$students[$i]->course}}</td>
                            <td>{{getApplicationStatus($value->applicationStatus)}} <i class="edit icon"></i></td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php
    function getApplicationStatus($status){

        if ($status == 1){
            echo '<p style="color: orange; text-align: center">Pending</p>';
        }else if ($status == 2){
            echo '<p style="color: blue; text-align: center">Interview Invitation</p>';
        }else if ($status == 3){
            echo '<p style="color: orange; text-align: center">Reviewing</p>';
        }else if ($status == 4){
            echo '<p style="color: green; text-align: center">Offer Letter Sent</p>';
        }else if ($status == 5){
            echo '<p style="color: red; text-align: center">Rejected by Student</p>';
        }else if ($status == 6){
            echo '<p style="color: red; text-align: center">Rejected by Employer</p>';
        }else if ($status == 7){
            echo '<p style="color: red; text-align: center">Rejected by Admin</p>';
        }else{
            return "Null";
        }
    }
?>
