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
        <div id = "HomePage">
            <div class="ui container segment" id = "studentInbox">
                <table class="ui celled striped table">
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Employer/Company</th>
                            <th>Title</th>
                        </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>10/2/2019</td>
                            <td>Chaintope Malaysia</td>
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
