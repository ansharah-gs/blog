@extends('layouts.app')
@section('title','Display')
@section('content')
<a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
    	{{$post->body}}
    </div>
    @if($post->tasks->count())
   		@foreach($post->tasks as $task)
			<div class="card">
		    	<form method="post" action="/tasks/{{$task->id}}">
		    		@csrf
		    		<label class="checkbox {{$task->completed ?'is-complete':''}} card-body" for="completed">
		    			<input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ?'checked':''}}>
		    			{{$task->description}}
		    		</label>
		    	</form>
		    </div>
		@endforeach
    </div>
    @endif
    <br>
    <div class="container">
	    <form class="card" method="post" action="/tasks/{{$post->id}}/tasks">
	    	@csrf
	    	<div class="field">
	    		<label  class="label" for="description">New Task</label>
	    	</div>
	    	<div class="control card-body">
	    		<input type="text" class="input" name="description" placeholder="New Task" required>
	    	</div>
	    	<button type="submit">Add Task</button>
	    	{{-- <table  id="myTable" class="display" style="width:100%">
		        <thead>
		            <tr>
		                <th>Title</th>
		                <th>Body</th>
		                <th>Created at</th>
		                <th>Updated at</th>
		        </thead>
		        <tfoot>
		            <tr>
		                <th>Title</th>
		                <th>Body</th>
		                <th>Created at</th>
		                <th>Updated at</th>
		            </tr>
		        </tfoot>
		    </table>

	    	@include('inc.errors')
	    	<script>
	    		$(document).ready( function () {
				    $('#myTable').DataTable();
				} );
	    	</script> --}}
	    </form>
	</div>
@endsection