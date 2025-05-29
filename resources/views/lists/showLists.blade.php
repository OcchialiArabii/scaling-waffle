@extends('layout')
@section('content')
<form action="/add-list" method="GET">
  <button>Add list</button>
</form>
@if(isset($_GET['statusCreate']))
    <p>{{ $_GET['statusCreate'] }}</p>
@endif
@if(count($lists) > 0)
<span>Count: {{count($lists)}} </span>
<table border='1'>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Options</th>
  </tr>
  @foreach($lists as $list)
  <tr id="list_{{$list['id']}}">
    <td>{{$list['name']}}</td>
    <td>{{$list['description']}}</td>
    <td>
      <form action='{{ route('lists.listsOptions', ['action' => 'draw-word']) }}' method='GET'>
        <button class='optionBtn' title='Draw word' name='id' value='{{$list['id']}}'>
          <img src='{{ asset('img/btn_draw.png') }}' alt="Draw">
        </button>
      </form>
      <form action='{{ route('lists.listsOptions', ['action' => 'add-word']) }}' method='GET'>
        <button class='optionBtn' title='Add word' name='id' value='{{$list['id']}}'>
          <img src='{{ asset('img/btn_add.png') }}' alt="Add">
        </button>
      </form>
      <form action='{{ route('lists.listsOptions', ['action' => 'edit-list']) }}' method='GET'>
        <button class='optionBtn' title='Edit word list' name='id' value='{{$list['id']}}'>
          <img src='{{ asset('img/btn_modify.png') }}' alt="Edit">
        </button>
      </form>
      <form action='{{ route('lists.listsOptions',['action'=> 'remove-list'])}}' method='GET'>
      <button class='optionBtn deleteBtn' title='Delete word list' name='id' value='{{$list['id']}}'>
        <img src='{{ asset('img/btn_delete.png') }}' alt="Delete">
      </button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
@else
<p>No existing lists.</p>
@endif
@endsection