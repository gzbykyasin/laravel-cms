<?php

namespace App\Http\Controllers\Admin;

use App\CustomerPdf;
use App\Customers;
use App\Galleries;
use App\Post;
use App\Product;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $data=array();

    public function index(){

        $product=CustomerPdf::with('product')->get();

        foreach ($product as $keyprod=>$prod) {
            foreach ($prod->product as $price){
                $this->data['data'][$keyprod]['price']=0.0;
                $this->data['data'][$keyprod]['price'] += (float)$price->counter*$price->price;
                $this->data['data'][$keyprod]['type']=$price->type;
            }
            $this->data['data'][$keyprod]['status']=$prod->status;
            $this->data['data'][$keyprod]['tarih']=$prod->created_at;
            $this->data['data'][$keyprod]['name']=date('Y-m-d',strtotime($prod->title));
        }

        $this->data['musteri']=Customers::count();
        $this->data['hizmet']=Services::count();
        $this->data['yazi']=Post::count();
        $this->data['galeri']=Galleries::count();

        if(!empty($this->data['data']))
            json_encode($this->data['data']);
        else
            $this->data['data']=json_encode(0);

        return view('admin.dashboard',$this->data);
    }
}
