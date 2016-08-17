<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Article extends Model 
{
    use Sluggable;

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table ="articles";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','content','user_id','categoria_id'
    ];

    public function scopeSearch($query,$title)
    {
        return $query->where('title','LIKE',"%$title%");
    }
    public function categoria()
    {
    	return $this->belongsTo('App\Categoria');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
