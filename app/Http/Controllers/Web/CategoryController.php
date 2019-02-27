<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\CategoryPost;
use App\Config;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $data=array();

    public function __construct()
    {
        $this->data['tumkategoriler']=Categories::limit(4)->get();
        $this->data['menuhizmetler']=Services::select(['name','slug'])->orderBy('sort','asc')->where('menu','=','1')->get();
        $this->data['ayarlar']=Config::find(1);
    }
    public function index(){

        $this->data['kategoriler']=Categories::all();
        return view('frontend.categories',$this->data);
    }

    public function category_detail($slug){
        $this->data['kategori']=Categories::where('slug',$slug)->first();
        $this->data['services']=CategoryPost::where('category_id',$this->data['kategori']->id)->get();
        return view('frontend.categories_detail',$this->data);
    }
}
