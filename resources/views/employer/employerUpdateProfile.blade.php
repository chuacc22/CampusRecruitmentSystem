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
        <div id = "employerUpdatePage" class="ui container">
            <form class = "ui form">
                <div class="ui container segment">
                <h2 class = "ui diving header">Change Password</h2>
                    <div class = "field">
                        <label> Old Password </label>
                        <input type="text" name = "searchjobtitle">
                    </div>
                    <div class = "two fields">
                        <div class = "field">
                            <label> New Password </label>
                            <input type="text" name = "searchjobtitle">
                        </div>
                        <div class = "field">
                            <label>Confirm Password</label>
                            <input type="text" name = "searchjoblocation">
                        </div>
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                        Change Password
                    </button> 
                </div>
            </form>
            <form class ="ui form" method="POST" action="{{URL::route('employerUpdateProfile.navi')}}">
                {{ csrf_field() }}
                <div class="ui container segment">
                    <h2 class = "ui diving header">Personal Info</h2>
                        <div class = "field">
                            <label> Name </label>
                            <input type="text" name = "name" value="{{$employer -> name}}">
                        </div>
                        <div class = "field">
                            <label> Email</label>
                            <input type="text" name = "email" value="{{$employer -> email}}">
                        </div>
                        <div class = "field">
                            <label> Mobile No.</label>
                            <input type="text" name = "mobileNo" value="{{$employer -> mobileNo}}">
                        </div>
                        <div class = "field">
                            <label> Address </label>
                            <textarea name = "address">{{$employer -> address}}</textarea>
                        </div>
                        <div class = "field">
                            <label> Company Name </label>
                            <input type="text" name = "companyName" value="{{$employer -> companyName}}">
                        </div>                        </div>
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                            UPDATE
                    </button>            
                </form>
        </div>
    </div>
</body>
<script>
</script>