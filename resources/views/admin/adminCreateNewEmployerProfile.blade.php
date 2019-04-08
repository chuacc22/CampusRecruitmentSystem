<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
        <div id = "adminCreateNewEmployerProfile" class="ui segment">
            <form class = "ui form" method="POST" action="{{URL::route('adminCreateNewEmployerProfile.navi')}}">
                {{ csrf_field() }}
                <div class="ui container">
                    <table class = "ui very basic table">
                        <h3> Create New Employer Profile </h3>
                        <tbody>
                            <tr>
                                <div class = "field">
                                    <label>Name</label>
                                <input type="text" name = "name">                                    
                                </div>
                            </tr>
                            <tr>
                                <div class = "field">
                                    <label>Password</label>
                                <input type="text" name = "password">                                    
                                </div>
                            </tr>
                            <tr>
                                <div class = "field">
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" name="mouStatus">
                                        <label>MOU Status</label>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <td>
                                    <div class = "field">
                                        <label>Email</label>
                                        <input type="text" name = "email">                                    
                                    </div>
                                <td>
                                <td>
                                    <div class = "field">
                                        <label>Contact No.</label>
                                        <input type="text" name = "mobileNo">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <label>Address</label>
                                    <div class = "field">
                                        <textarea name = "address"></textarea>
                                    </div>                                    
                                <td>
                            </tr>
                            <tr>
                                <div class = "field">
                                    <label>Company Name</label>
                                <input type="text" name = "companyName">                                    
                                </div>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <button class="ui left foated blue large button" style="margin-left: 42%;" type="submit">
                    Create Profile
                </button>                
            </form>
        </div>
    </div>
</body>
<script>
</script>