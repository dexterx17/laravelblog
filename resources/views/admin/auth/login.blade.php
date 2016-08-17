@extends('admin.template.main')

@section('title','Login')

@section('content')

{!! Form::open(['route'=>'admin.auth.login','method' => 'POST']) !!}
	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'ejemplo@gmail.com']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password','Constrase;a') !!}
		{!! Form::password('password',['class'=>'form-control','required','placeholder'=>'Ingrese su contrase;a']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Iniciar sesion',['class'=>'btn btn-primary form-control']) !!}
	</div>
{!! Form::close() !!}
@endsection