<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoriaRequest;
use App\Categoria;
use Laracasts\Flash\Flash;


class Categorias extends Controller
{
    public function index()
    {
    	$categorias = Categoria::orderBy('id','ASC')->paginate(5);

    	return view('admin.categorias.index',['categorias'=>$categorias]);
    }

    public function create()
    {
    	return view('admin.categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
    	$categoria = new Categoria($request->all());
    	$categoria->save();
    	flash("Categoria $categoria->name creada correctamente",'success');
    	return redirect()->route('admin.categorias.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        
        return view('admin.categorias.edit')->with('categoria',$categoria);
    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        /*$categoria->name=$request->name;
        */
        $categoria->save();
        flash("Categoria $categoria->name actualizada correctamente",'success');
        return redirect()->route('admin.categorias.index');
    }

    public function destroy($id)
    {
    	$categoria = Categoria::find($id);
    	$categoria->delete();
    	flash("Categoria $categoria->name eliminada correctamente",'danger');
    	return redirect()->route('admin.categorias.index');
    }
}
