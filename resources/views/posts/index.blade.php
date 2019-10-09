@extends('layouts.app')
@section('title','Posts')
@section('content')
<h1>Posts</h1>
<a href="{{route('posts.create')}}" class="btn btn-default">Create a new Post</a>

@if(count($posts) > 0)
@foreach($posts as $post)
	<div class="card bg-light">
		<div class="card-body">
			<h3><a href="/posts/{{$post->id}}">{{$post->title}}</h3></a>
			<small>Written on: {{$post->created_at}}</small>
			<a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
			<form method="POST" action="{{route('posts.destroy',$post->id)}}">
				@csrf
				@method('DELETE')
				<div>
					<button class="btn btn-danger" type="submit">Delete Post</button>
				</div>
			</form>		
		</div>
	</div>
	@endforeach
	{{-- {{$posts->links()}} --}}
@else
<p>No Posts Found</p>
@endif
@endsection
