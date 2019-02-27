<?php

namespace App\Http\Controllers\Admin;

use App\videoGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class VideoGalleryController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['videos']=VideoGallery::all();
        return view('admin.videoGallery.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videoGallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video=new VideoGallery();

        $video->name=$request->name;
        $video->description=$request->description;
        $video->video=$request->video;
        if ($video->save()){
            Alert::success('Video Galeri Eklendi!')->persistent("Kapat");
            return redirect('/admin/video/'.$video->id.'/edit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['video']=VideoGallery::find($id);
        return view('admin.videoGallery.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video=VideoGallery::find($id);

        $video->name=$request->name;
        $video->description=$request->description;
        $video->video=$request->video;
        if ($video->save()){
            Alert::success('Video Galeri Güncellendi!')->persistent("Kapat");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(VideoGallery::destroy($id)){
            Alert::success('Video Galeri Silindi!')->persistent("Kapat");
            return redirect()->back();
        }

    }
}
