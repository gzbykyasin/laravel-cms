<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\Config;
use App\Post;
use App\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $data=array();
    public function __construct()
    {
        setlocale(LC_ALL,[ 'tr_TR@TL', 'tr_TR', 'tr', 'Turkish']);
    }

    public function index(){
        $this->data['yazilar']=Post::all();


        return view('frontend.blog',$this->data);
    }

    public function blog_detail($slug){
        $slug=str_replace('.html','',$slug);
        $this->data['yazi']=Post::where('slug',$slug)->first();
        $this->data['hizmetlerimiz']=Services::select(['name','slug','predefined','title'])->get();
        /*dump($slug);*/
       // dd($this->data);
        return view('frontend.blog_detail',$this->data);
    }
}
