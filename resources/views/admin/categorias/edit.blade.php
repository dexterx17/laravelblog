@extends('admin.template.main')

@section('title','Crear categoria')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>['admin.categorias.update',$categoria->id],'method'=>'PUT']) !!}
	<div class="form-group">
		{!! Form::label('name','Nombre') !!}
		{!! Form::text('name',$categoria->name,['class'=>'form-control','required','placeholder'=>'Nombre de la categoria']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Guardar',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection