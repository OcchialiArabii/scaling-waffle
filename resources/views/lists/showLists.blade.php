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
    <td><!--
      <form action='./index.php' method='GET'>
        <button class='optionBtn' title='Losuj słówko' name='drawWord' value='{{$list['id']}}'>
          <img src='./img/btn_draw.png' alt="Draw">
        </button>
        <button class='optionBtn' title='Dodaj słówko' name='addWord' value='{{$list['id']}}'>
          <img src='./img/btn_add.png' alt="Add">
        </button>
        <button class='optionBtn' title='Edytuj liste słówek' name='editList' value='{{$list['id']}}'>
          <img src='./img/btn_modify.png' alt="Edit">
        </button>
      </form>
      <button class='optionBtn deleteBtn' title='Usuń liste' name='deleteList' value='{{$list['id']}}'>
        <img src='./img/btn_delete.png' alt="Delete">
      </button>
    </td> -->
  </tr>
  @endforeach
</table>
@else
<p>No existing lists.</p>
@endif
@endsection