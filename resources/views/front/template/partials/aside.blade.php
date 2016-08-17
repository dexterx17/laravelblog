<div class="panel panel-default">
	<div class="panel-heading">
		{{trans('app.categorias')}}
	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach($categorias as $categoria)
			<li class="list-group-item">
				<a href="{{route('front.search.category',$categoria->name)}}">
					{{$categoria->name}}
					<span class="badge">{{$categoria->articles->count()}}</span>
				</a>
			</li>
		@endforeach
		</ul>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		{{trans('app.tags')}}	
	</div>
	<div class="panel-body">
		@foreach($tags as $tag)
			<a href="{{route('front.search.tag',$tag->name)}}">
				<div class="label label-default">
					<span class="badge">{{ $tag->articles->count() }}</span>
					{{$tag->name}}
				</div>
			</a>
		@endforeach
	</div>
</div>