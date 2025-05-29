@extends("layout")
@section("content")

<h1 id=welcome>Hello {{ session('name') }}</h1>
<a  href='/lists'><button id=lists >Lists</button></a>


@endsection