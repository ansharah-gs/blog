@extends('layouts.app')
@section('title','Edit Product')
@section('content')
 <h2>Edit Product</h2>
  <form action="{{route('products.update',$product->id)}}" method="GET">
      @csrf
      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" placeholder="Enter Product Name" name="name" value="{{$product->name}}">
      </div>
      <div class="form-group">
        <label for="description">Product Description</label>
        <input type="text" class="form-control" placeholder="Enter Product Description" name="description" value="{{$product->description}}">
      </div>
      <button type="submit" class="btn btn-success">Update product</button>
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