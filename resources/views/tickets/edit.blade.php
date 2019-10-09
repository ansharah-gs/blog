@extends('layouts.app')
@section('title','Edit Ticket')
@section('content')
<div class="container">
  <h2>Edit Your Ticket</h2>
  <form action="{{ route('tickets.update')}}"  method="post">
  	@csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="hidden" name="id" value="{{$ticket->id}}">
      <input type="name" class="form-control" placeholder="Enter Your Name" name="name" value="{{$ticket->name}} ">
    </div>
    <button type="submit" class="btn btn-primary">Update Ticket</button>
  </form>
</div>
@endsection