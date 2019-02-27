<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table='home_pages';

    public function gallery(){
        return $this->belongsTo('App\Galleries','gallery_id','id');
    }
}
