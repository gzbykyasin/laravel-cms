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
