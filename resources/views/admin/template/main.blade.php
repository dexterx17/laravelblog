<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Default') | Panel Administracion</title>
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{ asset('bower_components/chosen/chosen.css')}}">
	<link rel="stylesheet" href="{{ asset('bower_components/trumbowyg/dist/ui/trumbowyg.css')}}">
</head>
<body>
<div class="container">
	
	@include('admin.template.partials.nav')
	<section class="panel panel-default">
		<div class="panel-heading">
			@yield('title','Default')
		</div>
		<div class="panel-body">
			
			@if (session()->has('flash_notification.message'))
			    <div class="alert alert-{{ session('flash_notification.level') }}">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			        {!! session('flash_notification.message') !!}
			    </div>
			@endif
			
			@yield('content')
		</div>
	</section>

	<footer>
		@include('admin.template.partials.footer')
	</footer>
	<script type="text/javascript" src="{{asset('bower_components/jquery/dist/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/chosen/chosen.jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/trumbowyg/dist/trumbowyg.js')}}"></script>
	@yield('js')
</div>
</body>
</html>