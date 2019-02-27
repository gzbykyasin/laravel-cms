<?php

namespace App\Http\Controllers\Admin;

use App\Galleries;
use App\GalleryPhotos;
use App\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class GalleriesController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['galeriler']=Galleries::all();
        return view('admin.gallery.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri= new Galleries();
        $galeri->title=$request->name;
        $galeri->description=$request->description;
        $galeri->save();
        $galeri_photo=new GalleryPhotos();
        $galeri_photo->photo_alt=$galeri->title;
        $galeri_photo->gallery_id=$galeri->id;
        $newFileName = Helper::fileNameGenerate('uploads/galeri/', $request->photo->getClientOriginalName(), $request->photo->getClientOriginalExtension());
        $request->photo->move('uploads/galeri/' , $newFileName);
        $galeri_photo->photo=$newFileName;
        if ($galeri_photo->save()){
            Alert::success('Galeri Kaydedildi!')->persistent("Kapat");
            return redirect('/admin/galeri/'.$galeri->id.'/edit');
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
        $this->data['galeri']=Galleries::find($id);
        $this->data['photos']=GalleryPhotos::where('gallery_id',$id)->get();
        return view('admin.gallery.edit',$this->data);
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
        $galeri= Galleries::find($id);
        $galeri->title=$request->name;
        $galeri->description=$request->description;
        $galeri->save();
        $galeri_photo=new GalleryPhotos();
        $galeri_photo->photo_alt=$galeri->title;
        $galeri_photo->gallery_id=$galeri->id;
        if(!empty($request->photo)){
            $newFileName = Helper::fileNameGenerate('uploads/galeri/', $request->photo->getClientOriginalName(), $request->photo->getClientOriginalExtension());
            $request->photo->move('uploads/galeri/' , $newFileName);
            $galeri_photo->photo=$newFileName;
        }
        if ($galeri_photo->save()){
            Alert::success('Galeri Güncellendi!')->persistent("Kapat");
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
        $galeri=Galleries::find($id);
        $galeriphoto=GalleryPhotos::where('gallery_id',$galeri->id)->get();

        //dd($galeriphoto);
        if(count($galeriphoto)>0){
            foreach ($galeriphoto as $photo){
                unlink(public_path().'/uploads/galeri/'.$photo->photo);
                GalleryPhotos::destroy($photo->id);
            }
            $galeri->delete();
            Alert::success('Galeri ve Resimler Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
        else{
            $galeri->delete();
            Alert::success('Galeri Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
    }

    public function photodestroy($id){
        $galeri=GalleryPhotos::find($id);
        unlink(public_path().'/uploads/galeri/'.$galeri->photo);
        if($galeri->delete()){
            Alert::success('Galeri Fotoğrafı Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
    }
}
