@extends('layout')
@section('content')
<p>ADD WORD TO THE LIST NO.{{$id}}</p>
<form action="{{ route('lists.addWord', ['action' => 'add-word']) }}" method="GET">
  <label>{{ $listDetails['lang1'] }}: <input type="text" name="lang1" required autofocus></label>
  <label>{{ $listDetails['lang2'] }}: <input type="text" name="lang2" required></label>
  @if(isset($_GET['page'])||isset($_POST['page']))
  <input name=page value=1 hidden>
  @endif
  <button type="submit" name='id' value='{{ $id }}'>Add word</button>
</form>
@if (isset( $status ))
<p>{!! $status !!}</p>
@endif
@if (isset( $_POST['page'])||isset($_GET['page']))
<form action='{{ route('lists.listsOptions', ['action' => 'edit-list']) }}' method='POST'>
        @csrf
        <button title='Edit word list' name='id' value='{{$listDetails['id']}}'>
            Go back to editing the list
        </button>
    </form>
@endif
<a  href='/lists'><button >Go back to the lists</button></a>
@endsection