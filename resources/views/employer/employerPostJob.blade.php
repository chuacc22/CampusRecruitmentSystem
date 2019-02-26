<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }
    </style>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/semantic.min.css') }}">
<script src="{{ asset('js/semantic.min.js') }}"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
        <div id = "employerPostJob" class="ui segment">
                <form class = "ui form">
                    <div class="ui container">
                        <table class = "ui very basic table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class = "field">
                                            <label>Company Name</label>
                                            <input type="text" name = "companyName">
                                        </div>
                                    </td>
                                    <td rowspan="3" class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class = "field">
                                            <label>Company Website</label>
                                            <textarea name="companyWebsite"></textarea>
                                        </div>
                                    <td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class = "field">
                                            <label>Company Reg.No</label>
                                            <input type="text" name = "companyRegNo">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui container">
                    <h2 class = "ui diving header">Change Password</h2>
                        <div class = "field">
                            <label> Old Password </label>
                            <input type="text" name = "employerOldPassword">
                        </div>
                        <div class = "two fields">
                            <div class = "field">
                                <label> New Password </label>
                                <input type="text" name = "employerNewPassword">
                            </div>
                            <div class = "field">
                                <label>Confirm Password</label>
                                <input type="text" name = "employerConfirmPassword">
                            </div>
                        </div>
                        <div class="ui button" tabindex="0">Update Password</div>
                    </div>
                    <div class="ui container segment">
                        <h2 class = "ui diving header">Personal Info</h2>
                            <div class = "two fields">
                                <div class = "field">
                                    <label> First Name </label>
                                    <input type="text" name = "employerFirstName">
                                </div>
                                <div class = "field">
                                    <label> Last Name</label>
                                    <input type="text" name = "employerLastName">
                                </div>
                            </div>
                            <div class = "field">
                                <label> Email</label>
                                <input type="text" name = "employerEmail">
                            </div>
                            <div class = "field">
                                <label> Mobile No.</label>
                                <input type="text" name = "employerMobileNo">
                            </div>
                            <div class = "field">
                                <label> Address </label>
                                <textarea name = "employerAddress"></textarea>
                            </div>
                            <div class = "field">
                                <label>Company Name </label>
                                <input type="text" name = "companyName">
                            </div>
                        </div>
                    <div class="ui button" tabindex="0">Update</div>
                </form>
        </div>
    </div>
</body>
<script>
</script>