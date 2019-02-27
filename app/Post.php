<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    protected $table='posts';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function gallery(){
        return $this->belongsTo('App\Galleries','gallery_id','id');
    }

    public function category(){
        return $this->hasMany('App\CategoryPost','post_id','id');
    }
}
