@extends('layout')
@section('content')
<p>EDIT LIST</p>
{{$id}}
<div>
<p>Modify list:</p>
<p>{{$listDetails['name']}}</p>
</div>
@endsection