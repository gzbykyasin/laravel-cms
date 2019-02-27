<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\Config;
use App\HomePage;
use App\Projects;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    protected $data=array();
    public function __construct()
    {
        $this->data['tumkategoriler']=Categories::limit(4)->get();
        $this->data['menuhizmetler']=Services::select(['name','slug'])->where('menu','=','1')->get();
        $this->data['ayarlar']=Config::find(1);
    }

    public function index(){
        $this->data['anasayfa']=HomePage::find(1);
        $this->data['hizmetler']=Services::limit(2)->orderBy('sort','asc')->get();
        $this->data['kategoriler']=Categories::all();
        $this->data['projeler']=Projects::limit(7)->get();
        return view('frontend.index',$this->data);

    }
}
