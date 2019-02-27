<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use Sluggable;

    protected $table='services';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function gallery(){
        return $this->belongsTo('App\Galleries','gallery_id','id');
    }

    public function category(){
        return $this->hasMany('App\CategoryPost','services_id','id');
    }
}
