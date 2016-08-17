<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Categoria;
use App\Tag;
use Carbon\Carbon;

class Front extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
    }

    public function index()
    {
    	$articles = Article::orderBy('id','DESC')->paginate(4);
    	$articles->each(function($articles){
    		$articles->categoria;
    		$articles->tags;
    		$articles->images;
    		$articles->user;
    	});
    	return view('front.index')
        ->with('articles',$articles);
    }

    public function searchCategory($name)
    {
        $categoria = Categoria::SearchCategory($name)->first();
        $articles = $categoria->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->categoria;
            $articles->images;
        });
        return view('front.index')
    	->with('articles',$articles);
    }

    public function searchTag($name)
    {
        $tag = Tag::SearchTag($name)->first();
        $articles = $tag->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->categoria;
            $articles->images;
        });
        return view('front.index')
        ->with('articles',$articles);
    }

    public function viewArticle($slug)
    {
        $article = Article::where('slug','=',$slug)->firstOrFail();
        $article->categoria;
        $article->user;
        $article->tags;
        $article->images;
        return view('front.article')
        ->with('article',$article);
    }
}
