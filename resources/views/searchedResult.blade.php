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
                @include('searchedResultTable')
        </div>
    </div>
</body>
<script>

    
</script>
