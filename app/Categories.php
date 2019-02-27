<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use Sluggable;
    protected $table='categories';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo('App\CategoryPost','id','category_id');
    }
}
