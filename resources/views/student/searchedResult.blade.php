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
        @include('layout.navigation')
        <div id = "searchedResultPage" class="ui container">
            <form class = "ui form" method="GET" action="{{URL::route('searchedResult')}}">
                <div class="ui container segment">
                <h2 class = "ui diving header">Search Criteria</h2>
                    <div class = "field">
                        <label> Search Job </label>
                        <input type="text" name = "searchjobtitle">
                    </div>
                    <div class = "two fields">
                        <div class = "field">
                            <label> Location </label>
                            <input type="text" name = "searchjoblocation">
                        </div>
                        <div class = "field">
                            <label> Career Type </label>
                            <input type="text" name = "careertype">
                        </div>
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                        SEARCH
                    </button>
                </div>
            </form>
            @if($job != null)
                @if ($job->isEmpty())
                    <h3>No Matched Result Found...</h3>
                @else
                    @include('/student/searchedResultTable')
                @endif
            @endif
        </div>
    </div>
</body>
<script>
</script>
