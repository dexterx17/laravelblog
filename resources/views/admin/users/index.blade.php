@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')
<a href="{{ route('admin.users.create') }}" class="btn btn-primary">Nuevo usuario</a>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Tipo</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>

				@if($user->type =="admin")
					<span class="label label-default">{{$user->type}}</span>
				@else
					<span class="label label-danger">{{$user->type}}</span>
				@endif
				
				</td>
				<td>
					<a href="{{route('admin.users.edit',$user->id)}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
					<a href="{{route('admin.users.destroy',$user->id)}}" class="glyphicon glyphicon-remove-circle btn btn-warning" onclick="return confirm('Seguro que deseas eliminarlo')"></a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
{!! $users->render() !!}

@endsection