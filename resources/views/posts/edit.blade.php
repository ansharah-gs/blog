@extends('layouts.app')
@section('title','Update Post')
@section('content')
	<h1>Edit Post</h1>
		<form action="{{route('posts.update',$post->id)}}" method="POST">
			 {{-- {{method_field('PATCH')}} --}}
			 @csrf  
			<div class="field">
				<label class="label" for="title">Title</label>
				<div class="control">
				<input type="text" name="title" placeholder="Post title" value="{{$post->title}}">
				</div>
			</div>
			<div class="field">
				<label class="label" for="description">Description</label>
				<div class="control">
					<input type="text" name="description" value="{{$post->body}}"></textarea>
				</div>
			<div>
			<div>
				<button  class="btn btn-success" type="submit">Update Post</button>
			</div>
			@include('inc.errors')
		</form>
		@endsection