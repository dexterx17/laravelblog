@extends('admin.template.main')

@section('title','Crear articulo')

@section('content')

@include('admin.template.partials.errors_form')

{!! Form::open(['route'=>['admin.articles.update',$article->id],'method'=>'PUT','files'=>true]) !!}
	<div class="form-group">
		{!! Form::label('title','Nombre') !!}
		{!! Form::text('title',$article->title,['class'=>'form-control','required','placeholder'=>'Titulo del articulo']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('categoria_id','Categoria') !!}
		{!! Form::select('categoria_id',$categorias,$article->categoria->id,['class'=>'form-control select-categoria','required','placeholder'=>'Seleccione una Categoria']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content',$article->content,['class'=>'form-control textarea-content','required','placeholder'=>'Contenido del articulo']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tags','Tags') !!}
		{!! Form::select('tags[]',$tags,$article_tags,['class'=>'form-control select-tag','required','placeholder'=>'Seleecione uno o varios tags', 'multiple']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('image','Imagen') !!}
		{!! Form::file('image',['class'=>'form-control','placeholder'=>'Categoria', 'multiple']) !!}
	</div>
	<div class="form-group">
		{!! Form::submit('Guardar',['class'=>'btn btn-primary form-control']) !!}
	</div>

{!! Form::close()!!}
@endsection

@section('js')
<script type="text/javascript">
	$('.select-tag').chosen({
		placeholder_text_multiple:"Seleccione un maximo de 3 tags",
		max_selected_options:3,
		no_results_text:'No se encontraron estos tags'
	});

	$('.select-categoria').chosen({
		placeholder_text_single:"Seleccione una categoria",
	});
	$('.textarea-content').trumbowyg();

</script>
@endsection