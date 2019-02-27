<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table='projects';

    public function getService(){
        return $this->belongsTo('App\Services','service','id');
    }
}
