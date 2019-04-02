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
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">ID</th>
                            <th>Employer Name</th>
                            <th class="three wide">Company Name</th>
                        </tr>
                        </thead>
                    <tbody>
                        @foreach($employers as $values)
                            <tr>
                                <td>{{$values->id}}</td>
                                <td><a href="/admin/adminViewEmployerDetail/{{$values->id}}">{{$values->name}}</td>
                                <td>{{$values->companyName}}</td>
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