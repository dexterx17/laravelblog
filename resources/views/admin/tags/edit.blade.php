@extends('admin.template.main')

@section('title','Crear tag')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>['admin.tags.update',$tag->id],'method'=>'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',$tag->name,['class'=>'form-control','required','placeholder'=>'Nombre del tag']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Guardar',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection