<!DOCTYPE html>
<html>
<head>
	<title>Error de acceso</title>
	<link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
</head>
<body>
<div class="box-admin">
	<div class="col-md-4 col-md-offset-4">	
		<div class="panel panel-waring">
			<div class="panel-heading">
				Acceso Restringido
			</div>
			<div class="panel-body">
				No tienes acceso a esta zona
			</div>
			<a href="{{route('front.index')}}">Volver al inicio</a>
		</div>
	</div>
</div>
</body>
</html>