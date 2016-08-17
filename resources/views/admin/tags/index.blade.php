@extends('admin.template.main')

@section('title','Lista de tags')

@section('content')
<a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Nuevo tag</a>

<!-- buscador de tags -->
	{!! Form::open(['route'=>'admin.tags.index','method'=>'GET','class'=>'navbar-form pull-right'])!!}
	<div class="input-group">
		{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar tag','aria-describedby'=>'buscar'])!!}
		<span class="input-group-addon" id="name">
			<span class="glyphicon glyphicon-search"></span>
		</span>
	</div>
	{!! Form::close() !!}
<!-- fin del buscador de tags -->
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
			<tr>
				<td>{{$tag->id}}</td>
				<td>{{$tag->name}}</td>
				<td>
					<a href="{{route('admin.tags.edit',$tag->id)}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
					<a href="{{route('admin.tags.destroy',$tag->id)}}" class="glyphicon glyphicon-remove-circle btn btn-warning" onclick="return confirm('Seguro que deseas eliminarlo')"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>


@endsection