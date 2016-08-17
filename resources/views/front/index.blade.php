@extends('front.template.main')

@section('title','Inicio')

@section('content')

<div class="row">
	<h3 class="title-front">{{trans('app.ultimos_articulos')}}</h3>
	@foreach($articles as $article)
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<a href="#" class="thumbnail">
						@foreach($article->images as $image)
							<img class="img-responsive img-article" src='{{asset("images/articles/$image->name")}}' alt="" width="100" height="100">
						
						@endforeach
					</a>
					<h3>
						<a href="{{route('front.view.article',$article->slug)}}">
							{{$article->title}}
						</a>
					</h3>
					<hr>
					<i class="fa fa-folder-open-o"></i> <a href="{{route('front.search.category',$article->categoria->name)}}">{{$article->categoria->name}}</a>
					<div class="pull-right">
						<i class="fa fa-clock-o"> {{$article->created_at->diffForHumans()}}</i>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
	<div class="row">
		{{ $articles->render()}}
	</div>
@endsection


@section('side')

@include('front.template.partials.aside')

@endsection