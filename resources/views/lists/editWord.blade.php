@extends('layout')
@section('content')
<p>EDIT WORD FROM THE LIST NO.{{$id}}</p>
<form action='{{ route('lists.editWord') }}' method='POST'>
    @csrf
    <label>{{ $list['lang1'] }}: <input type="text" name="wordN1" value={{$row['lang1']}} required autofocus></label>
    <label>{{ $list['lang2'] }}: <input type="text" name="wordN2" value={{$row['lang2']}} required></label>
    <input name=id value={{$id}} hidden>
    <button name='edit' value='{{ $row['id'] }}'>Edit Word</button>
</form>
@if (isset( $status ))
<p>{!! $status !!}</p>
@endif
<form action='{{ route('lists.listsOptions', ['action' => 'edit-list']) }}' method='POST'>
        @csrf
        <button title='Edit word list' name='id' value='{{$list['id']}}'>
            Go back to editing the list
        </button>
    </form>
<a  href='/lists'><button >Go back to the lists</button></a>
@endsection