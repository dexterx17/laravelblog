<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//RUTAS front-end
Route::get('/', [
    'uses'=>'Front@index',
    'as'=>'front.index'
]);

Route::get('categoria/{name}',[
    'uses'=>'Front@searchCategory',
    'as'=>'front.search.category'
]);

Route::get('tag/{name}',[
    'uses'=>'Front@searchTag',
    'as'=>'front.search.tag'
]);

Route::get('article/{slug}',[
    'uses'=>'Front@viewArticle',
    'as' =>'front.view.article'
]);

//RUTAS administracion
Route::group(['prefix' => 'admin','middleware'=>['auth']],function(){
    Route::get('/',['as' =>'admin.index', function () {
        return view('welcome');
    }]);

    Route::group(['middleware'=>'admin'],function(){
        Route::resource('users', 'Users');
        Route::get('users/{id}/destroy',[
        	'uses'=>'Users@destroy',
        	'as' =>'admin.users.destroy'
        ]);
    });
    Route::resource('categorias','Categorias');
    Route::get('categorias/{id}/destroy',[
        'uses'=>'Categorias@destroy',
        'as' =>'admin.categorias.destroy'
    ]);
    Route::resource('tags','Tags');
    Route::get('tags/{id}/destroy',[
        'uses'=>'Tags@destroy',
        'as' =>'admin.tags.destroy'
    ]);
    Route::resource('articles','Articles');
    Route::get('articles/{id}/destroy',[
    	'uses'=>'Articles@destroy',
    	'as' =>'admin.articles.destroy'
    ]);

    Route::get('images',[
        'uses'=>'Images@index',
        'as'=>'admin.images.index'
    ]);
});

// Authentication routes...
Route::get('admin/auth/login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as' => 'admin.auth.login'
]);
Route::post('admin/auth/login',[
    'uses'=>'Auth\AuthController@postLogin',
    'as' => 'admin.auth.login'
]);
Route::get('admin/auth/logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as' => 'admin.auth.logout'
]);
