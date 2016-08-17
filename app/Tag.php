<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table ="tags";
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
    	return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%");
    }

    public function scopeSearchTag($query,$name)
    {
        return $query->where('name','=',"$name");
    }

}
