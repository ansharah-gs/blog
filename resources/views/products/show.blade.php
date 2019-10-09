@extends('layouts.app')
@section('title','View Product')
@section('content')
<a href="/products" class="btn">Back</a>
<h1>{{$product->name}}</h1>
<p>{{$product->description}}</p>
<small>Written on{{$product->created_at}} </small>
@endsection