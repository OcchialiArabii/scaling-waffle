<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery-3.7.1.min.js')}}" defer></script>
  <title>LosLang</title>
</head>

<body>
  <a id=home href="/home">Home Page</a>
  @yield('content')
  <br><br>
  
  
</body>

</html>