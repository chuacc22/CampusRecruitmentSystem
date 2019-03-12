<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.navigation')
        <div id = "studentApplicationFormPage" class="ui container">
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
                </div>
                <div class="ui container segment">
                    <h2 class = "ui diving header">Personal Info</h2>
                        <div class = "two fields">
                            <div class = "field">
                                <label> First Name </label>
                                <input type="text" name = "studentFirstName">
                            </div>
                            <div class = "field">
                                <label> Last Name</label>
                                <input type="text" name = "studentLastName">
                            </div>
                        </div>
                        <div class = "field">
                            <label> Email</label>
                            <input type="text" name = "studentEmail">
                        </div>
                        <div class = "field">
                            <label> Mobile No.</label>
                            <input type="text" name = "studentMobileNo">
                        </div>
                        <div class = "field">
                            <label> Address </label>
                            <textarea name = "student Address"></textarea>
                        </div>
                    </div>
                <div class="ui container segment">
                    <h2 class = "ui diving header">Education</h2>
                        <div class = "field">
                            <label> Course/Programme </label>
                            <input type="text" name = "studentCourse">
                        </div>
                        <div class = "field">
                            <label> CGPA</label>
                            <input type="text" name = "studentCGPA">
                        </div>
                        <div class = "field">
                            <label> Achievement</label>
                            <input type="text" name = "studentAchievement">
                        </div>
                        <div class = "field">
                            <label> Club/Society</label>
                            <input type="text" name = "studentClub">
                        </div>
                        <div class = "field">
                            <label> Skills </label>
                            <textarea name = "studentSkills"></textarea>
                        </div>
                        <div class = "field">
                            <label> Resume </label>
                            <textarea name = "studentResume"></textarea>
                        </div>
                    </div>
                <div class="ui button" tabindex="0">Update Profile</div>
            </form>
        </div>
    </div>
</body>
<script>
</script>