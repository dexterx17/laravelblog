@extends('admin.template.main')

@section('title','Lista de usuarios')

@section('content')

	<div class="row">
		@foreach($imagenes as $imagen)
			<div class="col-md-4">
				<div class="panel">
					<div class="panel-heading">
						{{$imagen->article->title}}
					</div>
					<div class="panel-body">
						<img class="img-rounded" src='{{asset("/images/articles/$imagen->name")}}' alt="" width="100" height="100">
					</div>
				</div>
			</div>		
		@endforeach
	</div>
@endsection