<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table='category_posts';

    public function category(){
        return $this->belongsTo('App\Categories','category_id','id');
    }

    public function getService(){
        return $this->belongsTo('App\Services','services_id','id');
    }
}
