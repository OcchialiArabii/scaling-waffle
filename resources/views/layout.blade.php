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
  <a href="/lists">Home Page</a>
  <h6>UP -- UP -- UP -- UP -- UP</h6>
  @yield('content')
  <h6>DOWN -- DOWN -- DOWN -- DOWN</h6>
</body>

</html>