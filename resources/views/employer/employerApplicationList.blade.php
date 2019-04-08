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
                {{ csrf_field() }}
                <table class="ui celled stripped table">
                    <thead>
                        <tr>
                            <th class="three wide">Send Date</th>
                            <th>Applicant Name</th>
                            <th>Course / Programme</th>
                            <th class ="three wide">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($applications as $value)
                        <tr>
                            <td>{{$value->created_at->format('d/m/Y')}}</td>
                        <td><a href="/employer/employerViewApplication/{{$value->id}}">{{$students[$i]->name}}<a></td>
                            <td>{{$students[$i]->course}}</td>
                        <td>{{getApplicationStatus($value->applicationStatus)}}<button id="editStatus" data-id="{{$value->id}}"><i class="edit icon"></i></button></td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>

                {{-- update status button --}}
                <div id="updateStatus" class="ui modal tiny">
                        <div class="content">
                            <div class="header">
                                <i class="fas fa-exclamation-circle" style="font-size:80px"></i>
                            </div>
                            <form id="updateStatusForm" class="ui form" method="post" >
                                {{ csrf_field() }}
                                <div class="field">
                                    <select name= "applicationStatus" class="ui search dropdown">
                                        <option class="item" value="1">Pending</option>
                                        <option class="item" value="2">Interview Invitation</option>
                                        <option class="item" value="3">Reviewing</option>
                                        <option class="item" value="4">Offer Letter Sent</option>
                                        <option class="item" value="5">Rejected by Student</option>
                                        <option class="item" value="6">Rejected by Employer</option>
                                    </select>
                                </div>
                                <button class="ui button" id="confirmUpdateBtn" type="submit">
                                    Update</button>
                            </form>
                            <div class="footer">
                                <button class= "ui red button" id="cancelBtn"> Cancel </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
<?php
    function getApplicationStatus($status){

        if ($status == 1){
            echo '<p style="color: orange; text-align: left">Pending  ';
        }else if ($status == 2){
            echo '<p style="color: blue; text-align: center">Interview Invitation  ';
        }else if ($status == 3){
            echo '<p style="color: orange; text-align: center">Reviewing  ';
        }else if ($status == 4){
            echo '<p style="color: green; text-align: center">Offer Letter Sent  ';
        }else if ($status == 5){
            echo '<p style="color: red; text-align: center">Rejected by Student  ';
        }else if ($status == 6){
            echo '<p style="color: red; text-align: center">Rejected by Employer  ';
        }else if ($status == 7){
            echo '<p style="color: red; text-align: center">Rejected by Admin  ';
        }else{
            return "Null";
        }
    }
?>
<script>
    //show modal script
    var modal = document.getElementById('updateStatus');
    var btns = document.querySelectorAll('#editStatus');
    var form = document.getElementById('updateStatusForm');
    var att = document.createAttribute('action');
    [].forEach.call(btns, function (el) {
        el.onclick = function () {
            modal.style.display = "block";
            att.value = "/employer/employerUpdateApplicationStatus/" + el.dataset.id;
            form.setAttributeNode(att);
        }
    })

    //cancel delete script
    var cancelBtn = document.getElementById("cancelBtn");
    cancelBtn.onclick = function () {
        modal.style.display = "none";
    }

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>

