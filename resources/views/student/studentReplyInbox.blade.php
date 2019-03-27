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
        <div id = "studentReplyInbox" class="ui container">
            <form class = "ui form" method="POST" action="{{URL::route('searchedResult')}}">
                <div class="ui raised very padded text container segment">
                <h2 class = "ui diving header">Reply</h2>
                    <div class = "field">
                        <h3><b> To: </b></h3>
                        <h3></h3>
                    </div>
                    <div class = "field">
                        <h3><b> From: </b></h3>
                        <h3></h3>
                    </div>
                    <div class = "field">
                        <textarea name = "letterDesc"></textarea>
                    </div>
                    <button class="ui left foated blue large button" type="submit">
                        <i class="reply icon"></i>
                            Send
                        </i>
                    </button>
                </div>
            </form>
            {{-- @include('/student/searchedResultTable') --}}
        </div>
    </div>
</body>
<script>
</script>