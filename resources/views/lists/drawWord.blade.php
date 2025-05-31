@extends('layout')
@section('content')
<h1>DRAW A WORD</h1>
<h3>{{$word1}}=>{{$word2}}</h3>
<br> 
@php
$list=$lists->find($id)
@endphp


<form action='{{ route('lists.listsOptions', ['action' => 'draw-word']) }}' method='GET'>
        <button title='Draw word' name='id' value='{{$list['id']}}'>
            Roll Again!
        </button>
        </form>
        <a  href='/lists'><button >Go back to the lists</button></a>


@endsection