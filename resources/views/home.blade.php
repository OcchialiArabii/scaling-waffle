@extends("layout")
@section("content")

<h1>Hello {{ session('name') }}</h1>
<a href='/lists'><button >Add</button></a>

@endsection