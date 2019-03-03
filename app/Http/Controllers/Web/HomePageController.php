<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\CategoryPost;
use App\Config;
use App\HomePage;
use App\Projects;
use App\Services;
use App\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    protected $data=array();
    public function __construct()
    {

    }

    public function index(){
        $this->data['anasayfa']=HomePage::find(1);
        $this->data['kategoriler']=Categories::limit(6)->get();
        $this->data['projeler']=Projects::all();
        $this->data['videolar']=VideoGallery::limit(4)->get();
        //dd($this->data);
        return view('frontend.index',$this->data);

    }
}
