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
        {{ csrf_field() }}
            <div class="ui container segment" id = "employerManageJob">
                <div class="ui segment">
                    <a class="ui labeled icon button" href="{{URL::route('employerPostJob.navi')}}">
                        <i class="plus circle icon"></i>
                        Create New Job
                    </a>
                   <table class="ui celled striped table">
                        <thead>
                            <tr>
                                <th class="three wide">Date</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                        <tbody>
                            @foreach($job as $value)
                            <tr>
                                <td>{{$value->updated_at->format('d/m/Y')}}</td>
                                <td>
                                    <a href="/employer/employerViewJob/{{$value->id}}">
                                        {{$value -> title}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
<script>

</script>
