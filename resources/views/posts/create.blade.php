@extends('layouts.app')
@section('title','Create Post')
@section('content')
<h1>Create Post</h1>
{{-- <form action="{{route('posts.store')}}" method="POST"> --}}
	<form action="{{route('posts.store')}}" method="POST">
		@csrf
	<div  class="form-group has-error has-feedback">
		<input type="text" class="form-control input {{$errors->has('title')? 'is-invalid':''}}" id="inputError" name="title"  value="{{old('title')}}">
	</div>
	<div>
		<textarea name="description"  class="form-control textarea {{$errors->has('description')? 'is-invalid':''}}">{{old('description')}}</textarea>
	</div>
	<div>
		<button type="submit">Create Post</button>
	</div>	
	@include('inc.errors')
</form>
@endsection