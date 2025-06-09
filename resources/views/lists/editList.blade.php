@extends('layout')
@section('content')
<p>EDIT LIST {{$id}}</p>
<section>
  <h5>Modify list:</h5>

  <form action={{route('lists.editList')}} method=POST>
  @csrf
  <label for=name >Name:<input value={{$listDetails['name']}} name=name></label>
  <br>
  <label for=Description >Description:<input value='{{$listDetails['description']}}' name=description></label>
  <p>Private: 
    <label>Yes<input type="radio" name="private" value=1 {{ ($listDetails['private'] == 1) ? 'checked' : '' }}></label>
    <label>No<input type="radio" name="private" value=0 {{ ($listDetails['private'] == 0) ? 'checked' : '' }}></label>
  </p>
  <button type=submit value={{$id}} name=id>Edit List!</button>

  </form>

  <form action='{{ route('lists.listsOptions', ['action' => 'add-word']) }}' method='POST'>
    @csrf
    <input name=page value=1 hidden>
    <button name='id' value='{{$id}}'>Add word</button>
  </form>
</section>
@if(isset($message))
      <h2>{{$message}}</h2>
    @endif
<main>
  @if (count($listContent) > 0)
  <span>Count: {{count($listContent)}} </span>
  <table border="1">
    <tr>
      <th>{{ $listDetails['lang1'] }}</th>
      <th>{{ $listDetails['lang2'] }}</th>
      <th>Options</th>
    </tr>
    @foreach ($listContent as $row)
    <tr>
      <td>{{ $row['lang1'] }}</td>
      <td>{{ $row['lang2'] }}</td>
      <td>
        <form action='{{route('lists.listsOptions',['action'=>'edit-word']) }}' method='POST'>
          @csrf
          <input name=id value={{$id}} hidden>
        <button class='optionBtn' title='Edit word' name='edit' value='{{ $row['id'] }}'>
          <img src='{{ asset('img/btn_modify.png') }}' alt="Edit">
        </button>
        </form>
        <form action='{{route('lists.listsOptions',['action'=>'remove-word'])}}' method='POST'>
          @csrf
          <input name=id value={{$id}} hidden>
          <button class='optionBtn' title='Delete word' name='row_id' value='{{ $row['id'] }}'>
          <img src='{{ asset('img/btn_delete.png') }}' alt="Delete">
          </button>
        </form>
    </td>
    </tr>
    @endforeach
  </table>
  @else
  <p>No existing words in list.</p>
  @endif
</main>
<a  href='/lists'><button >Go back to the lists</button></a>
@endsection 