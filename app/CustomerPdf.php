<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class CustomerPdf extends Model
{
    use Sluggable;

    protected $table='customer_pdfs';

    public $timestamps=false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function product(){
        return $this->hasMany('App\Product','pdf_id','id');
    }

    public function customer(){
        return $this->belongsTo('App\Customers','customer_id','id');
    }

}
