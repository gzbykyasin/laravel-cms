<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\CategoryPost;
use App\Config;
use App\GalleryPhotos;
use App\Projects;
use App\Services;
use App\VideoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    protected $data=array();

    public function __construct()
    {

    }

    public function services(){
        $this->data['hizmetler']=Services::all();
        return view('frontend.services',$this->data);
    }
    //TODO:Burası düzenlenecek
    public function service_detail($slug){
        $this->data['hizmet']=Services::where('slug',$slug)->first();
        $this->data['resimler']=GalleryPhotos::where('gallery_id',$this->data['hizmet']->gallery_id)->get();
        $this->data['hizmetler']=Services::select(['id','slug'])->where('id','!=',$this->data['hizmet']->id)->limit(2)->get();
        $this->data['tumhizmetler']=Services::select(['id','slug','predefined','name','title'])->where('id','!=',$this->data['hizmet']->id)->get();
        $this->data['kategoriler']=CategoryPost::where('services_id',$this->data['hizmet']->id)->get();
        $this->data['projeler']=Projects::limit(3)->get();
        //dd($this->data);
        return view('frontend.service_detail',$this->data);
    }

    public function video_gallery(){
        $this->data['videolar']=VideoGallery::all();
        return view('frontend.videos_gallery',$this->data);
    }

}
