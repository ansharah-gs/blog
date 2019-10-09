@extends('layouts.app')


@section('title','Demo')
@section('content')

<ul>
@foreach($tasks as $task)
<li>{{$task}}</li>
@endforeach
</ul>
@endsection
