@extends('admin.template.main')

@section('title','Crear usuario')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Nombre']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'ejemplo@gmail.com']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password','Constrase;a') !!}
		{!! Form::password('password',['class'=>'form-control','required','placeholder'=>'Ingrese su contrase;a']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('type','Tipo') !!}
		{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],"",['class'=>'form-control','required','placeholder'=>'Seleccione un nivel']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registrar',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection