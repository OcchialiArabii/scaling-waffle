<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="{{ asset('js/refresh.js')}}" defer></script>
    <link href="{{asset('css/auth.css')}}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1>Log in</h1>
    @isset($message)
            <p class='mess'>{{$message}}</p>
            @unset($message)
    @endisset

    <form action="/" method="POST">
        @csrf
        <input type="text" name="login" id='login' placeholder="Login...">
        <input type='password' name='passwd' id='passwd' placeholder='Password...'>
        <input type='submit' value='Sign in' class ="submit">
    </form>
    <br>
    <a href="/register"><button>Register</button></a>
</body>
</html>