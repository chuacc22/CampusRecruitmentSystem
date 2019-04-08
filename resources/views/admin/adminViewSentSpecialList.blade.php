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
        @include('layout.adminNavi')
        <div id = "adminViewSentSpecialList">
            <div class="ui container segment" id = "SentSpecialList">
                <table class="ui celled stripped table">
                    <h3>Sent Application List</h3>
                    <thead>
                        <tr>
                            <th class="three wide">Date</th>
                            <th>Applicant Name</th>
                            <th>Course / Programme</th>
                            <th>Company Name</th>
                            <th>Employer Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($applications as $value)
                        <tr>
                            <td>{{$value->updated_at->format('d/m/Y')}}</td>
                            <td><a href="/admin/adminViewApplication/{{$value->id}}">{{$students[$i]->name}}<a></td>
                            <td>{{$students[$i]->course}}</td>
                            <td>{{$employers[$i]->companyName}}</td>
                            <td>{{$employers[$i]->name}}</td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>