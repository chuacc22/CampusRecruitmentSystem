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