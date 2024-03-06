@extends('layout')
@section('content')

<form action="{{ route('addList') }}" method="POST">
  @csrf
  <label for="name">Table name:</label>
  <input type="text" name="name" required>
  
  <label for="description">Description:</label>
  <textarea name="description" required></textarea>

  <button type="submit">Add table</button>
</form>
@endsection