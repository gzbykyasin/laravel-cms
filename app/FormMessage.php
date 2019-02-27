<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormMessage extends Model
{
    protected $table='form_messages';

    public function getService(){
        return $this->belongsTo('App\Services','service','id');
    }
}
