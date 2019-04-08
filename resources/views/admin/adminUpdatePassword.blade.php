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
        <div id = "adminUpdatePassword" class="ui container">
            <form class = "ui form" method="POST" action="{{URL::route('adminUpdatePassword')}}">
                {{ csrf_field() }}
                <div class="ui container segment">
                <h2 class = "ui diving header">Change Password</h2>
                    <div class = "field">
                        <label> Old Password </label>
                        <input type="password" name = "oldPassword">
                    </div>
                    <div class = "two fields">
                        <div class = "field">
                            <label> New Password </label>
                            <input type="password" name = "password">
                        </div>
                        <div class = "field">
                            <label>Confirm Password</label>
                            <input type="password" name = "checkPassword">
                        </div>
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                        Change Password
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