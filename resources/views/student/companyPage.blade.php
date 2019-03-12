<!DOCTYPE html>
<html>
<head>
    <style>
        .ui.table tr td { 
            border-top: 0px !important; 
        }

        .myPre {
            font-family: "Times New Roman";
        }

    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.navigation')
        <div id = "companyPage" class="ui container segment">
            <table class = "ui very basic table">
                <tbody>
                    <tr>
                        <td><h2><b>companyName</b></h2></td>
                        <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>JOB DESCRIPTION</h3>
                            <pre class="myPre">jobDesc
                        <td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>Requirements</h3>
                            <pre class="myPre">requirements</pre>
                        <td>
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <h3>We're looking for :</h3>
                            <pre class="myPre">lookingFor</pre>
                        <td>
                    </tr>
                    <tr>
                        <td>
                            <div class="ui segment">
                                <h3>Company Overview</h3>
                                <pre class="myPre">CompanyOverview</pre>
                            </div>
                        </td>
                        <td>
                            <div class="ui segment">
                                <h3>Company Snapshot</h3>
                                <pre class="myPre">CompanyOverview</pre>
                            </div>
                        </td>
                    </tr>
                    <tr>
                            <td>
                                <h3>WORK LOCATION</h3>
                                <b>Address</b>
                                <pre class="myPre">location</pre>
                            </td>
                            <td>
                                <h3>Contact Us</h3>
                                <pre class="myPre">email</pre>
                            </td>
                        </tr>
                </tbody>
            </table>
            {{-- @if($job != null)
                @if ($job->isEmpty())
                    <h3>No job found...</h3>
                @else
                    @include('/student/searchedResultTable')
                @endif
            @endif --}}
        </div>
    </div>
</body>
<script>
</script>
