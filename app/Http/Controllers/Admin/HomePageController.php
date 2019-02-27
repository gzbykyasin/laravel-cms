<?php

namespace App\Http\Controllers\Admin;

use App\Galleries;
use App\HomePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class HomePageController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['ayarlar']=HomePage::find(1);
        $this->data['galeriler']=Galleries::all();
        return view('admin.homePage.edit',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        $config=HomePage::find(1);
        $config->gallery_id=$request->gallery_id ?? 0;
        $config->title=$request->name;
        $config->description=$request->description;
        $config->keywords=$request->keywords;
        $config->icerik_title=$request->icerik_title;
        $config->icerik_description=$request->icerik_description;
        $config->youtube=$request->youtube;
        $config->youtube_title=$request->youtube_title;
        $config->youtube_description=$request->youtube_description;

        if($config->save()){
            Alert::success('Anasayfa Güncellendi!')->persistent("Close");
            return redirect()->back();
        }
    }


}
