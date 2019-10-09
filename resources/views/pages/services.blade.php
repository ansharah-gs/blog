@extends ('layouts.app')
@section('title','Services')
@section('content')
<h1>{{$data['title']}}</h1>
 @if(count($data)> 0) // to check if there is atleast 1 service in service
	 <ul>
		  @foreach($data['services']  as $service)
		  <li>{{ $service }}</li>
		  @endforeach
	</ul>
 @endif
@endsection