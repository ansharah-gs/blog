@extends('layouts.app')
@section('title','Tickets')
@section('content')
<a href="{{ route('tickets.create') }}" class="btn btn-success">Create  a Ticket</a>
<h1>Tickets</h1>
@if(count($tickets)>0)
	@foreach($tickets as $ticket)
		<div class="card bg-light">
		<div class="card-body">
			<h3><a href="/tickets/{{$ticket->id}}">{{$ticket->name}}</h3></a>
			<small>Written on: {{$ticket->created_at}}</small>
			<a href="{{route('tickets.edit',$ticket->id)}}" class="btn btn-primary">Edit</a>
			<form method="POST" action="{{route('tickets.destroy',$ticket->id)}}">
				@csrf
				@method('DELETE')
				<div>
					<button class="btn btn-danger" type="submit">Delete product</button>
				</div>
		    </form>		
		</div>
	</div>		
	@endforeach
@endif
@endsection