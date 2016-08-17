<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Categoria;
use App\Tag;

class AsideComposer{

	public function compose(View $view)
	{
		$categorias = Categoria::orderBy('name','ASC')->get();
		$tags = Tag::orderBy('name','ASC')->get();
		
		$view->with('categorias',$categorias)
		->with('tags',$tags);
	}
}