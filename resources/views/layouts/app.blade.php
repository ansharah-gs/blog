 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>                
        <title>@yield('title')</title>
        {{-- <title>{{config('app.name','Blog')}}</title> --}}
        <style type="text/css">
            .is-complete{
                text-decoration: line-through;
            }
        </style>
   </head>
    <body>
    	@include('inc.nav')
    	<div class="container">
    		@yield('content')
    	</div>
           @yield('script')
    </body>

</html>