@extends('layouts.app')
@section('title','View Products')
@section('content')
 <a href= "{{ route('products.create') }}" class="btn btn-success">Add a new Product</a>
 <h1>Products</h1>
 @if(count($products) > 0)
 @foreach($products as $product)
	<div class="card bg-light">
		<div class="card-body">
			<h3><a href="/products/{{$product->id}}">{{$product->name}}</h3></a>
			<small>Written on: {{$product->created_at}}</small>
			<a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
			<form method="POST" action="{{route('products.destroy',$product->id)}}">
				@csrf
				@method('DELETE')
				<div>
					<button class="btn btn-danger" type="submit">Delete product</button>
				</div>
		    </form>		
		</div>
	</div>
	@endforeach
@else
<p>No Products Found</p>
@endif
@endsection