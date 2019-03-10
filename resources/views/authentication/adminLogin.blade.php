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
        @include('layout.loginNavi')
        <div id = "adminLoginPage">
            <div class="ui raised very padded text container segment">
                <form class = "ui form"  method="POST" action="{{url('/login/checkAdminLogin')}}">
                    {{ csrf_field() }}
                    @if(isset(Auth::user()->email))
                        <script>
                            window.location = "/login/successAdminlogin";
                        </script>
                    @endif
                    <h2 class = "ui center aligned diving header"> Admin Login </h2>
                    <div class = "field">
                        <label> Email </label>
                        <input type="text" name = "email">
                        </div>
                    <div class = "field">
                        <label> Password </label>
                        <input type="text" name = "password">
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
</script>