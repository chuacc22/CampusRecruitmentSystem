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
        <div id = "adminViewEmployer">
            <div class="ui container segment" id = "ManageEmployer">
                {{ csrf_field() }}
                <a class="ui labeled icon button" href="{{URL::route('adminCreateEmployer.navi')}}">
                        <i class="plus circle icon"></i>
                        Create New Employer Profile
                    </a>
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="two wide">ID</th>
                            <th class="three wide">Updated Date</th>
                            <th>Employer Name</th>
                            <th class="three wide">Company Name</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($employers as $values)
                            <tr>
                                    <td>{{$values->id}}</td>
                                    <td>{{$values->updated_at->format('d/m/Y')}}</td>
                                    <td><a href="/admin/adminViewEmployerDetail/{{$values->id}}">{{$values->name}}</a><button id="editEmployerStatus" data-id="{{$values->id}}"><i class="edit icon"></i></button></td>
                                <td>{{$values->companyName}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="updateEmployerStatus" class="ui modal tiny">
                    <div class="content">
                        <div class="header">
                            <i class="fas fa-exclamation-circle" style="font-size:80px"></i>
                        </div>
                        <form id="updateEmployerStatusForm" class="ui form" method="post" >
                            {{ csrf_field() }}
                            <div class="field">
                                <select name="status" class="ui search dropdown">
                                    <option class="item" value="1">Active</option>
                                    <option class="item" value="0">Suspend</option>
                                </select>
                            </div>
                            <button class="ui button" id="confirmUpdateBtn" type="submit">
                                Update</button>
                        </form>
                        <div class="footer">
                            <button class= "ui red button" id="employerCancelBtn"> Cancel </button>
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
    var modal = document.getElementById('updateEmployerStatus');
    var btns = document.querySelectorAll('#editEmployerStatus');
    var form = document.getElementById('updateEmployerStatusForm');
    var att = document.createAttribute("action");
    att.value = "/admin/adminChangeEmployerStatus/" +
    [].forEach.call(btns, function (el) {
        el.onclick = function () {
            modal.style.display = "block";
            att.value = "/admin/adminChangeEmployerStatus/" + el.dataset.id;
            form.setAttributeNode(att);
        }
    })

    //cancel delete script
    var cancelBtn = document.getElementById("employerCancelBtn");
    cancelBtn.onclick = function () {
        modal.style.display = "none";
    }
</script>