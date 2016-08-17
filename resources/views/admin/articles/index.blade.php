@extends('admin.template.main')

@section('title','Lista de articulos')

@section('content')
<a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Nuevo articulo</a>
<!-- buscador de articles -->
	{!! Form::open(['route'=>'admin.articles.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
	<div class="input-group">
		{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar por titulo','aria-describedby'=>'buscar'])!!}
		<span class="input-group-addon" id="title">
			<span class="glyphicon glyphicon-search"></span>
		</span>
	</div>
	{!! Form::close() !!}
<!-- fin del buscador de articles -->
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo</th>
			<th>Categoria</th>
			<th>User</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($articles as $article)
			<tr>
				<td>{{$article->id}}</td>
				<td>{{$article->title}}</td>
				<td>{{$article->categoria->name}}</td>
				<td>{{$article->user->name}}</td>
				<td>
					<a href="{{route('admin.articles.edit',$article->id)}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
					<a href="{{route('admin.articles.destroy',$article->id)}}" class="glyphicon glyphicon-remove-circle btn btn-warning" onclick="return confirm('Seguro que deseas eliminarlo')"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $articles->render() !!}

@endsection