@extends('layout')
@section('content')
<h1>DRAW A WORD</h1>
<br> 
@php
$list=$lists->find($id);
if(!isset($flip))
{
    $flip=false;
}
@endphp

@if (!$flip)
    <h3>{{$word1}}</h3>
@else
    <h3>{{$word2}}</h3>
@endif

<form action='{{ route('flip') }}' method='POST'>
    @csrf
        <button title='Draw word' name='flip' value={{!$flip}}>
            Flip!
        </button>
        <input hidden name=id value={{$list['id']}}>
        <input hidden name=word1 value={{$word1}}>
        <input hidden name=word2 value={{$word2}}>
</form>
<form action='{{ route('lists.listsOptions', ['action' => 'draw-word']) }}' method='POST'>
    @csrf
        <button title='Draw word' name='id' value='{{$list['id']}}'>
            
            Roll Again!
        </button>
</form>
<a  href='/lists'><button >Go back to the lists</button></a>


@endsection