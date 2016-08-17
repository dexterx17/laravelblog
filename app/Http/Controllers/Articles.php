<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Categoria;
use App\Tag;
use App\Image;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;

class Articles extends Controller
{
    public function index(Request $request)
    {
    	$articles = Article::search($request->title)->orderBy('id','ASC')->paginate(5);

        $articles->each(function($articles){
            $articles->categoria;
            $articles->user;
            $articles->tags;
        });
    	return view('admin.articles.index',['articles'=>$articles]);
    }

    public function create()
    {
    	$categorias = Categoria::orderBy('name','ASC')->lists('name','id');
    	$tags = Tag::orderBy('name','ASC')->lists('name','id');
    	return view('admin.articles.create')
    	->with('categorias',$categorias)
    	->with('tags',$tags);
    }

    public function store(ArticleRequest $request)
    {

    	$article = new Article($request->all());
    	$article->user_id=\Auth::user()->id;
    	$article->save();
    	$article->tags()->sync($request->tags);

    	if($request->file('image'))
    	{
	    	$file = $request->file('image');
	    	$name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
	    	
	    	$path = public_path().'/images/articles/';
	    	$file->move($path,$name);

	    	$imagen = new Image();
	    	$imagen->name = $name;
	    	$imagen->article()->associate($article);
	    	$imagen->save();
    	}

    	flash("Articulo $article->title creado correctamente",'success');
    	return redirect()->route('admin.articles.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $categorias = Categoria::orderBy('name','ASC')->lists('name','id');
        $tags = Tag::orderBy('name','ASC')->lists('name','id');
        $article = Article::find($id);
        $article->categoria;
        $article_tags = $article->tags->lists('id')->toArray();
        //dd($article);
        return view('admin.articles.edit')
        ->with('article',$article)
        ->with('categorias',$categorias)
        ->with('tags',$tags)
        ->with('article_tags',$article_tags);
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();
        $article->tags()->sync($request->tags);

        if($request->file('image'))
        {
            $file = $request->file('image');
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            
            $path = public_path().'/images/articles/';
            $file->move($path,$name);

            $imagen = new Image();
            $imagen->name = $name;
            $imagen->article()->associate($article);
            $imagen->save();
        }

        flash("Articulo $article->title actualizado correctamente",'success');
        return redirect()->route('admin.articles.index');
    }

    public function destroy($id)
    {
    	$article = Article::find($id);
    	$article->delete();
    	return redirect()->route('admin.articles.index');
    }
}
