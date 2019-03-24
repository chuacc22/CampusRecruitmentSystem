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
        <div id = "employerPostJob" class="ui segment">
        <form class = "ui form" method="POST" action="/employer/employerEditJob/{{$job->id}}">
                <div class="ui container">
                    {{ csrf_field() }}
                    <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <div class = "field">
                                    <label>Job Title</label>
                                <input type="text" name = "title" value="{{$job -> title}}">                                    
                                </div>
                            <tr>
                            <tr>
                                <td>
                                    <div class = "field">
                                        <label>Company Website</label>
                                    <input type="text" name = "companyWeb" value="{{$job -> companyWeb}}">                                    
                                    </div>
                                <td>
                                <td>
                                    <div class = "field">
                                        <label>Company Reg.No</label>
                                        <input type="text" name = "companyRegNo" value="{{$job -> companyRegNo}}">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <td>
                                    <b><div class = "field">
                                        <label>Company Name</label>
                                        <input type="text" name = "companyName" value="{{$job -> companyName}}">
                                    </div></b>
                                </td>
                                <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>JOB DESCRIPTION</h3>
                                    <div class = "field">
                                        <textarea name = "jobDesc">{{$job -> jobDesc}}"</textarea>
                                    </div>
                                <td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>Requirements</h3>
                                    <div class = "field">
                                        <textarea name = "requirement">{{$job -> requirement}}</textarea>
                                    </div>
                                <td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>We're looking for :</h3>
                                    <div class = "field">
                                        <textarea name = "lookingFor">{{$job -> lookingFor}}</textarea>
                                    </div>                                    
                                <td>
                            </tr>
                            <tr>
                                <div class="ui two column stackable center aligned grid">
                                    <td style="width:50%" valign="top" >
                                        <h3>Company Overview</h3>
                                        <div class = "field">
                                                <textarea name = "companyOverview">{{$job -> companyOverview}}</textarea>
                                        </div>                                        
                                    </td>
                                    <td style="width:50%; border-left: 1px solid #e8e9e9;" valign="top">
                                        <h3>Company Snapshot</h3>
                                        <div class = "field">
                                            <textarea name = "companySnapshot">{{$job -> companySnapshot}}</textarea>
                                        </div>                                          
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <h3>WORK LOCATION</h3>
                                    <b>Address</b>
                                    <div class = "field">
                                        <input type="text" name = "address" value="{{$job -> address}}">
                                        <input type="text" name = "district" value="{{$job -> district}}">
                                        <input type="text" name = "state" value="{{$job -> state}}">
                                    </div>            
                                </td>
                                <td valign="top">
                                    <h3>Contact Us</h3>
                                    <div class = "field">
                                        <textarea name = "contactUs">{{$job -> contactUs}}</textarea>
                                    </div>                                     
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="ui left foated blue large button" style="margin-left: 42%;" type="submit">
                        Update Job
                    </button>                
            </form>
        </div>
    </div>
</body>
<script>
</script>