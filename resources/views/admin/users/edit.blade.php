@extends('admin.template.main')

@section('title','Crear usuario')

@section('content')

{!! Form::open(['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',$user->name,['class'=>'form-control','required','placeholder'=>'Nombre']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email','Correo') !!}
		{!! Form::email('email',$user->email,['class'=>'form-control','required','placeholder'=>'ejemplo@gmail.com']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('type','Tipo') !!}
		{!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control','required','placeholder'=>'Seleccione un nivel']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Registrar',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection