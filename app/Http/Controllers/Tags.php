<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoriaRequest;
use App\Tag;


class Tags extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::search($request->name)->orderBy('id','ASC')->paginate(5);
    	//$tags = Tag::where('name','=','C++')->get();

    	return view('admin.tags.index',['tags'=>$tags]);
    }

    public function create()
    {
    	return view('admin.tags.create');
    }

    public function store(CategoriaRequest $request)
    {
    	$tag = new Tag($request->all());
    	$tag->save();
    	flash("Tag $tag->name creado correctamente",'success');
    	return redirect()->route('admin.tags.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        
        return view('admin.tags.edit')->with('tag',$tag);
    }
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all());
        /*$tag->name=$request->name;
        */
        $tag->save();
        flash("Tag $tag->name actualizado correctamente",'success');
        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
    	$tag = Tag::find($id);
    	$tag->delete();
    	flash("Tag $tag->name eliminado correctamente",'danger');
    	return redirect()->route('admin.tags.index');
    }
}
