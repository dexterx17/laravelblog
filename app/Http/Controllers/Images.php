<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Image;
use App\Http\Requests;

class Images extends Controller
{
    public function index()
    {
    	$imagenes = Image::all();
    	$imagenes->each(function($imagenes){
    		$imagenes->article();
    	});
    	return view('admin.images.index')->with('imagenes',$imagenes);
    }
}
