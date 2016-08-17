<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use Laracasts\Flash\Flash;

class Users extends Controller
{
    public function index()
    {
    	$users = User::orderBy('id','ASC')->paginate(5);

    	return view('admin.users.index',['users'=>$users]);
    }

    public function create()
    {
    	return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
    	$user = new User($request->all());
        $user->type=$request->type;
    	$user->password = bcrypt($request->password);
    	$user->save();
    	flash("Usuario $user->name creado correctamente",'success');
    	return redirect()->route('admin.users.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        
        return view('admin.users.edit')->with('user',$user);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        /*$user->name=$request->name;
        $user->email=$request->email;
        */
        $user->type=$request->type;
        $user->save();
        flash("Usuario $user->name actualizado correctamente",'success');
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
    	$user = User::find($id);
    	$user->delete();
    	flash("Usuario $user->name eliminado correctamente",'danger');
    	return redirect()->route('admin.users.index');
    }
}
