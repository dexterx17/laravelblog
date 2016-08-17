@extends('front.template.main')

@section('title',$article->title)

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>{{$article->title}}</h2>
	</div>
	<div class="panel-body">
		<a href="#" class="thumbnail">
			@foreach($article->images as $image)
				<img class="img-responsive img-article" src='{{asset("images/articles/$image->name")}}' alt="" width="100" height="100">
			
			@endforeach
		</a>
		<p>
			{{$article->content}}
			
		</p>
	</div>
	<div class="panel-footer">
		<i class="fa fa-folder-open-o"></i> <a href="{{route('front.search.category',$article->categoria->name)}}">{{trans('app.categoria',['nombre'=>$article->categoria->name])}}</a>
		<span class="pull-right">
			<i class="fa fa-clock-o"> {{$article->created_at->diffForHumans()}}</i>
		</span>
		<hr />
		<h3>Comentarios</h3>
		<div id="disqus_thread"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = '//dexterx17.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    

	</div>
</div>
@endsection

@section('side')

@include('front.template.partials.aside')

@endsection