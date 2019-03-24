<!DOCTYPE html>
<html>
<head>
    <style>

        /* .ui.table tr td { 
            border-top: 0px !important; 
        } */

        .myPre {
            font-family: "Helvetica";
            display: flex;
            white-space: pre-line;
            word-break: break-word;
            font-size: 16px;
            /* overflow: hidden;
            margin: 0 auto; */
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div id = "companyPage" class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
            <div class="ui container segment">
                {{ csrf_field() }}
                    <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <td>
                                    <a class="ui left floated labeled icon button" href="/employer/employerEditJob/{{$job->id}}">
                                        <i class="edit icon"></i>
                                        Edit
                                    </a>
                                </td>
                                <td class= "right aligned">
                                <form method="post"  action="/employer/employerDeleteJob/{{$job->id}}" >
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="ui right floated labeled icon button" type="submit">
                                            <i class="trash alternate icon"></i>
                                            Delete
                                        </button></td>
                                    </form>
                            </tr>
                            <tr>
                                <td><h2><b>{{$job->companyName}}</b></h2></td>
                                <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>JOB DESCRIPTION</h3>
                                    <div class="myPre" style="">{{$job->jobDesc}}</div>
                                <td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>Requirements</h3>
                                    <pre class="myPre">{{$job->requirement}}</pre>
                                <td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    <h3>We're looking for :</h3>
                                    <pre class="myPre">{{$job->lookingFor}}</pre>
                                <td>
                            </tr>
                            <tr>
                                <div class="ui two column stackable center aligned grid">
                                    <td style="width:50%" valign="top" >
                                        <h3>Company Overview</h3>
                                        <br>{{$job->companyOverview}}
                                    </td>
                                    <td style="width:50%; border-left: 1px solid #e8e9e9;" valign="top">
                                        <h3>Company Snapshot</h3>
                                        <pre class="myPre">{{$job->companySnapshot}}</pre>
                                    </td>
                                </div>
                            </tr>
                            <tr>
                                <td valign="top">
                                    <h3>WORK LOCATION</h3>
                                    <b>Address</b>
                                    <br>{{$job->address}}, 
                                    <br> {{$job->district}}, {{$job->state}}

                                </td>
                                <td valign="top">
                                    <h3>Contact Us</h3>
                                    <pre class="myPre">{{$job->contactUs}}</pre>
                                </td>
                            </tr>
                        </tbody>
                    </table>
         </div>
    </div>
</body>
<script>
</script>
