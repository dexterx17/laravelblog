@extends('admin.template.main')

@section('title','Crear tag')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>'admin.tags.store','method'=>'POST']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Nombre del tag']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Crear',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection