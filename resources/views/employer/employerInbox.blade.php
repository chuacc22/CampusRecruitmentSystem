<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<body>
    <div class = "ui container fuild" >
        <!-- header --> 
        @include('layout.header')
        @include('layout.employerNavi')
        <div id = "HomePage">
            <div class="ui container segment" id = "employerInbox">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Name</th>
                            <th>Title</th>
                        </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>10/2/2019</td>
                            <td>Chua Chang Chyuan</td>
                            <td>Application </td>
                        </tr>
                            <div id = "inboxTables">
                                {{-- <tr>
                                    <td> test</td>
                                    <td>Initial commit</td>
                                    <td>10 hours ago</td>
                                </tr> --}}
                            </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>

</script>
