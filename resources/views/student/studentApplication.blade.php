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
        <div id = "studentApplicationFormPage">
                <form class = "ui form">
                    <div class="ui raised very padded text container segment">
                    <h2 class = "ui diving header">Change Password</h2>
                        <div class = "two fields">
                            <div class = "field">
                                <label> Job title, </label>
                                <input type="text" name = "searchjobtitle">
                            </div>
                            <div class = "field">
                                <label>Location</label>
                                <input type="text" name = "searchjoblocation">
                            </div>
                        </div>
                    </div>
                    <div class="ui raised very padded text container segment">
                        <h2 class = "ui diving header">Application Form</h2>
                            <div class = "two fields">
                                <div class = "field">
                                    <label> Job title, </label>
                                    <input type="text" name = "searchjobtitle">
                                </div>
                                <div class = "field">
                                    <label>Location</label>
                                    <input type="text" name = "searchjoblocation">
                                </div>
                            </div>
                        </div>
                    <div class="ui raised very padded text container segment">
                    <h2 class = "ui diving header">Application Form</h2>
                        <div class = "two fields">
                            <div class = "field">
                                <label> Job title, </label>
                                <input type="text" name = "searchjobtitle">
                            </div>
                            <div class = "field">
                                <label>Location</label>
                                <input type="text" name = "searchjoblocation">
                            </div>
                        </div>
                    </div>
                    <div class="ui button" tabindex="0">Submit Order</div>
                </form>
        </div>
    </div>
</body>
<script>
</script>