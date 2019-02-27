<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\Config;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $data=array();
    public function __construct()
    {
        $this->data['tumkategoriler']=Categories::limit(4)->get();

        $this->data['menuhizmetler']=Services::select(['name','slug'])->where('menu','=','1')->get();
        $this->data['ayarlar']=Config::find(1);
    }

    public function index(){
        return view('frontend.blog',$this->data);
    }

    public function blog_detail($slug){
        return view('frontend.blog_detail',$this->data);
    }
}
