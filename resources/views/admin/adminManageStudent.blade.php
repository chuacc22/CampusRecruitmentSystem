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
                            <th class="two wide">ID</th>
                            <th class="three wide">Updated Date</th>
                            <th>Student Name</th>
                            <th class="three wide">Course</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($students as $values)
                            <tr>
                                <td>{{$values->id}}</td>
                                <td>{{$values->updated_at->format('d/m/Y')}}</td>
                            <td><a href="/admin/adminViewStudentDetail/{{$values->id}}">{{$values->name}}</a><button id="editStudentStatus" data-id="{{$values->id}}"><i class="edit icon"></i></button></td>
                                <td>{{$values->course}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
                {{-- update Status --}}
                <div id="updateStudentStatus" class="ui modal tiny">
                    <div class="content">
                        <div class="header">
                            <i class="fas fa-exclamation-circle" style="font-size:80px"></i>
                        </div>
                        <form id="updateStudentStatusForm" class="ui form" method="post" >
                            {{ csrf_field() }}
                            <div class="field">
                                <select name="status" class="ui search dropdown">
                                    <option class="item" value="1">Active</option>
                                    <option class="item" value="0">Suspend</option>
                                </select>
                            </div>
                            <button class="ui blue button" id="confirmUpdateBtn" type="submit">
                                Update</button>
                        </form>
                        <br><div class="footer">
                            <button class= "ui button" id="studentCancelBtn"> Cancel </button>
                        </div>
                    </div>
                </div>               
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

    //show modal script
    var modal = document.getElementById('updateStudentStatus');
    var btns = document.querySelectorAll('#editStudentStatus');
    var form = document.getElementById('updateStudentStatusForm');
    var att = document.createAttribute("action");
    att.value = "/admin/adminChangeStudentStatus/" +
    [].forEach.call(btns, function (el) {
        el.onclick = function () {
            modal.style.display = "block";
            att.value = "/admin/adminChangeStudentStatus/" + el.dataset.id;
            form.setAttributeNode(att);
        }
    })

    //cancel delete script
    var cancelBtn = document.getElementById("studentCancelBtn");
    cancelBtn.onclick = function () {
        modal.style.display = "none";
    }
</script>
