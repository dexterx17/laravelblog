@extends('admin.template.main')

@section('title','Lista de categorias')

@section('content')
<a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">Nueva categoria</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categorias as $categoria)
			<tr>
				<td>{{$categoria->id}}</td>
				<td>{{$categoria->name}}</td>
				<td>
					<a href="{{route('admin.categorias.edit',$categoria->id)}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
					<a href="{{route('admin.categorias.destroy',$categoria->id)}}" class="glyphicon glyphicon-remove-circle btn btn-warning" onclick="return confirm('Seguro que deseas eliminarlo')"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $categorias->render() !!}

@endsection