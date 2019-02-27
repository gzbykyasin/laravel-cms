<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $table='customers';

    public function pdf(){
        return $this->hasMany('App\CustomerPdf','customer_id','id');
    }

}
