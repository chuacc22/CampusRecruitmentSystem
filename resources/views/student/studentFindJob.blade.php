<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/semantic.min.css') }}">
<link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/semantic.min.js') }}"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.navigation')
        <div id = "studentFindJob">
            <div class="ui raised very padded text container segment" id = "Job Search">
                <form class = "ui form" method="GET" action="{{URL::route('searchedResult')}}">
                    <h2 class = "ui diving header">Job Search</h2>
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
                        <button class="ui left foated blue large button" type="submit">
                            SEARCH
                        </button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    // function searchJob(){

    // }
</script>
