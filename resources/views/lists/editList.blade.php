@extends('layout')
@section('content')
<p>EDIT LIST {{$id}}</p>
<section>
  <h5>Modify list:</h5>
  <p>Name: <span>{{ $listDetails['name'] }}</span></p>
  <p>Description: <span>{{ $listDetails['description'] }}</span></p>
  <p>Private: 
    <label>Yes<input type="radio" name="private" {{ ($listDetails['private'] == 1) ? 'checked' : '' }}></label>
    <label>No<input type="radio" name="private" {{ ($listDetails['private'] == 0) ? 'checked' : '' }}></label>
  </p>
  <form action='{{ route('lists.listsOptions', ['action' => 'add-word']) }}' method='GET'>
    <button name='id' value='{{$id}}'>Add word</button>
  </form>
</section>
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
        <button class='optionBtn' title='Edit word' name='editWord' value='{{ $row['id'] }}'>
          <img src='{{ asset('img/btn_modify.png') }}' alt="Edit">
        </button>
        <button class='optionBtn' title='Delete word' name='deleteWord' value='{{ $row['id'] }}'>
          <img src='{{ asset('img/btn_delete.png') }}' alt="Delete">
        </button>
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