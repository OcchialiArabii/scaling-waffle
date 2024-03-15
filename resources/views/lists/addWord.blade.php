@extends('layout')
@section('content')
<p>ADD WORD {{$id}}</p>
<form action="{{ route('lists.addWord', ['action' => 'add-word']) }}" method="POST">
  @csrf
  <label>{{ $listDetails['lang1'] }}: <input type="text" name="lang1" required autofocus></label>
  <label>{{ $listDetails['lang2'] }}: <input type="text" name="lang2" required></label>
  <button type="submit" name='id' value='{{ $id }}'>Add word</button>
</form>
@if (isset($status))
<p>{{ $status }}</p>
@endif
@endsection