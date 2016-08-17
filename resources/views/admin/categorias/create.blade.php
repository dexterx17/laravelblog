@extends('admin.template.main')

@section('title','Crear categoria')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>'admin.categorias.store','method'=>'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Nombre de la categoria']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Crear',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection