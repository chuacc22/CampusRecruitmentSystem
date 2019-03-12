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
        @include('layout.navigation')
        @foreach ($job as $value)
            <div class="ui container segment">
                <table class = "ui very basic table">
                <tbody>
                    <tr>
                        <td><h2><b>{{$value -> companyName}}</b></h2></td>
                        <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>JOB DESCRIPTION</h3>
                            <div class="myPre" style="">{{$value -> jobDesc}}</div>
                        <td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Requirements</h3>
                            <pre class="myPre">{{$value -> requirement}}</pre>
                        <td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>We're looking for :</h3>
                            <pre class="myPre">{{$value -> lookingFor}}</pre>
                        <td>
                    </tr>
                    <tr>
                        <div class="ui two column stackable center aligned grid">
                            <td style="width:50%" valign="top" >
                                <h3>Company Overview</h3>
                                <br>{{$value -> companyOverview}}
                            </td>
                            <td style="width:50%; border-left: 1px solid #e8e9e9;" valign="top">
                                <h3>Company Snapshot</h3>
                                <pre class="myPre">{{$value -> companySnapshot}}</pre>
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td valign="top">
                            <h3>WORK LOCATION</h3>
                            <b>Address</b>
                            <br>{{$value -> address}}, 
                            <br> {{$value -> district}}, {{$value -> state}}

                        </td>
                        <td valign="top">
                            <h3>Contact Us</h3>
                            <pre class="myPre">{{$value -> contactUs}}</pre>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="ui left foated blue large button" style="margin-left: 42%;" type="submit">
                APPLY NOW 
            </button>
         </div>
            
        @endforeach
    </div>
    
</body>
<script>
</script>
