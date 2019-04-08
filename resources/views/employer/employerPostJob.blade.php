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
            <form class = "ui form" method="POST" action="{{URL::route('employerPostJob.navi')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="ui container">
                    <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <div class = "field">
                                    <label>Job Title</label>
                                <input type="text" name = "title">                                    
                                </div>
                            <tr>
                            <tr>
                                <td>
                                    <div class = "field">
                                        <label>Company Website</label>
                                        <input type="text" name = "companyWeb">                                    
                                    </div>
                                </td>
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
                <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <td>
                                    <b><div class = "field">
                                        <label>Company Name</label>
                                        <input type="text" name = "companyName">
                                    </div></b>
                                </td>
                                <td>
                                    <div class = "field">
                                    <label><b> Company Logo </b></label>
                                    <input type="file" name="companyLogo" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput">
                                    {{-- <img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}">  --}}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>JOB DESCRIPTION</h3>
                                    <div class = "field">
                                        <textarea name = "jobDesc"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>Requirements</h3>
                                    <div class = "field">
                                        <textarea name = "requirement"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>We're looking for :</h3>
                                    <div class = "field">
                                        <textarea name = "lookingFor"></textarea>
                                    </div>                                    
                                </td>
                            </tr>
                            <tr>
                                <div class="ui two column stackable center aligned grid">
                                    <td style="width:50%" valign="top" >
                                        <h3>Company Overview</h3>
                                        <div class = "field">
                                                <textarea name = "companyOverview"></textarea>
                                        </div>                                        
                                    </td>
                                    <td style="width:50%; border-left: 1px solid #e8e9e9;" valign="top">
                                        <h3>Company Snapshot</h3>
                                        <div class = "field">
                                            <textarea name = "companySnapshot"></textarea>
                                        </div>                                          
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <h3>WORK LOCATION</h3>
                                    <b>Address</b>
                                    <div class = "field">
                                        <input type="text" name = "address" placeholder="Address">
                                        <input type="text" name = "district" placeholder="District & PostCode">
                                        <input type="text" name = "state" placeholder="State">
                                    </div>            
                                </td>
                                <td valign="top">
                                    <h3>Contact Us</h3>
                                    <div class = "field">
                                        <textarea name = "contactUs"></textarea>
                                    </div>                                     
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="ui left foated blue large button" style="margin-left: 42%;" type="submit">
                        Post Job
                    </button>                
            </form>
        </div>
    </div>
</body>
<script>
</script>