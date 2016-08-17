<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

	protected $table ="categorias";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function articles()
    {
    	return $this->hasMany('App\Article');
    }

    public function scopeSearchCategory($query, $name)
    {
        return $query->where('name','=',$name);
    }
    
}
