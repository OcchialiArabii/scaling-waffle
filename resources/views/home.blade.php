@extends("layout")
@section("content")

<h1 id=welcome>Hello {{ session('name') }}</h1>
<a  href='/lists'><button>Lists</button></a>
<br><br>
<a href="/logout"><button>Logout</button></a>
@endsection