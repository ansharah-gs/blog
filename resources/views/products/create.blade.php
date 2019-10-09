@extends('layouts.app')
@section('title','Add new Product')
@section('content')
  <h2>Add a New Product</h2>
  <form action="{{route('products.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" placeholder="Enter Product Name" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
      <label for="description">Product Description</label>
      <input type="text" class="form-control" placeholder="Enter Product Description" name="description" value="{{old('description')}}">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    @if($errors->any())
  <div class="alert alert-danger" role="alert">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  </form>
@endsection 