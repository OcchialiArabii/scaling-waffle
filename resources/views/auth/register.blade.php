<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/auth.css')}}" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="/register" method="POST">
        @csrf
        <input name='login' id='login' type='text' placeholder='Login...'>
        <input name='passwd' id='passwd' type='password' placeholder='Password...'>
        <input name='email' id='email' type='email' placeholder='E-mail...'>
        <input type="submit" value="Confirm" class="submit">
    </form>
    <br>
    <a href="/"><button>Login</button></a>
    
</body>
</html>