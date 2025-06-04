@extends('layout')
@section('content')
<p>ADD WORD TO THE LIST NO.{{$id}}</p>
<form action="{{ route('lists.addWord', ['action' => 'add-word']) }}" method="GET">
  <label>{{ $listDetails['lang1'] }}: <input type="text" name="lang1" required autofocus></label>
  <label>{{ $listDetails['lang2'] }}: <input type="text" name="lang2" required></label>
  <button type="submit" name='id' value='{{ $id }}'>Add word</button>
</form>
@if (isset( $status ))
<p>{!! $status !!}</p>
@endif
<a  href='/lists'><button >Go back to the lists</button></a>
@endsection