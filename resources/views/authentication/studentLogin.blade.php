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
        @include('layout.loginNavi')
        <div id = "loginPage">
            <div class="ui raised very padded text container segment">
                <form class = "ui form"  method="POST" action="{{url('/login/checkLogin')}}">
                        {{ csrf_field() }}
                        @if($message = \Session::get('error'))
                            <div class="alert-block">
                                <i class="material-icons" size="20" style="color:red">error</i>
                                <strong>{{$message}}</strong></li>
                            </div>
                        @endif
                    <h2 class = "ui center aligned diving header"> Student Login </h2>
                        <div class = "field">
                            <label> Email </label>
                            <input type="text" name = "email">
                            </div>
                        <div class = "field">
                            <label> Password </label>
                            <input type="password" name = "password">
                        </div>
                    <button class="ui left foated blue large button" type="submit">
                        LOGIN
                    </button>
                </form>
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