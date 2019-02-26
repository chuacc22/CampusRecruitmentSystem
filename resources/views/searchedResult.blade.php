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
        @include('layout.navigation')
        <div id = "searchedResultPage" class="ui container">
            <form class = "ui form">
                <div class="ui container segment">
                <h2 class = "ui diving header">Search Criteria</h2>
                    <div class = "field">
                        <label> Search Job </label>
                        <input type="text" name = "searchjobtitle">
                    </div>
                    <div class = "two fields">
                        <div class = "field">
                            <label> Location </label>
                            <input type="text" name = "searchjobtitle">
                        </div>
                        <div class = "field">
                            <label> Career Type </label>
                            <input type="text" name = "searchjoblocation">
                        </div>
                    </div>
                    <div class="ui button" tabindex="0">Search</div>
                </div>
            </form>
                <div class="ui container segment">
                    <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <td><h2><u>Chaintope Malaysia Sdn. Bhd</u></h2>
                                    <br><i class="map marker icon"></i>Bangsar South, Vertical VE</td>
                                <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    Primary responsibilities will be designing, testing and building end-to-end mobile or 
                                    web applications (native and/or hybrid) using JavaScript frameworks (ReactJS, AngularJS), 
                                    AJAX, restful web services and databases (relational/NoSQL)to meet customer requirements 
                                    and goals. Maintain quality and...
                                <td>
                            </tr>
                            <tr>
                                <td>We're looking for:
                                    <br><b>Full stack developer
                                    <br>Blockchain Engineer</b>
                                </td>
                                <td><b>Contact Us</b>
                                    <br>info@Chaintope.com
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="ui container segment">
                    <table class = "ui very basic table">
                        <tbody>
                            <tr>
                                <td><h2><u>Chaintope Malaysia Sdn. Bhd</u></h2>
                                    <br><i class="map marker icon"></i>Bangsar South, Vertical VE</td>
                                <td class= "right aligned"><img style="height: 100px; width:160px" src = "{{URL::asset('/images/ChaintopeLogo.png')}}"> </td>
                            </tr>
                            <tr>
                                <td colspan = "2">
                                    Primary responsibilities will be designing, testing and building end-to-end mobile or 
                                    web applications (native and/or hybrid) using JavaScript frameworks (ReactJS, AngularJS), 
                                    AJAX, restful web services and databases (relational/NoSQL)to meet customer requirements 
                                    and goals. Maintain quality and...
                                <td>
                            </tr>
                            <tr>
                                <td>We're looking for:
                                    <br><b>Full stack developer
                                    <br>Blockchain Engineer</b>
                                </td>
                                <td><b>Contact Us</b>
                                    <br>info@Chaintope.com
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
<script>
</script>