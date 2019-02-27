<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\CategoryPost;
use App\Galleries;
use App\Helper;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ServicesController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['hizmetler']=Services::all();
        return view('admin.services.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['galeriler']=Galleries::all();
        $this->data['kategoriler']=Categories::all();
        return view('admin.services.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hizmet=new Services();
        $hizmet->name=$request->name;
        $hizmet->gallery_id=$request->gallery_id;
        $hizmet->title=$request->title;
        $hizmet->description=$request->description;
        $hizmet->keywords=$request->keywords;

        $hizmet->data=$request->data;
        $hizmet->data_extra=$request->data_extra;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/hizmetler/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/hizmetler/' , $newFileName);
            $hizmet->predefined=$newFileName;
        }
        if ($hizmet->save()){
            if(count($request->category)>0){
                foreach ($request->category as $item){
                    $kategori=new CategoryPost();
                    $kategori->category_id=$item;
                    $kategori->services_id=$hizmet->id;
                    $kategori->save();
                }
            }
            Alert::success('Hizmet Eklendi!')->persistent("Kapat");
            return redirect('/admin/hizmet/'.$hizmet->id.'/edit');
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
        $this->data['kategoriler']=Categories::all();
        $this->data['galeriler']=Galleries::all();
        $this->data['hizmet']=Services::with('category')->where('id',$id)->first();

        return view('admin.services.edit',$this->data);
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

        $hizmet=Services::find($id);
        $hizmet->name=$request->name;
        $hizmet->gallery_id=$request->gallery_id;
        $hizmet->title=$request->title;
        $hizmet->description=$request->description;
        $hizmet->keywords=$request->keywords;

        $hizmet->data=$request->data;
        $hizmet->menu=$request->menu;
        $hizmet->data_extra=$request->data_extra;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/hizmetler/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/hizmetler/' , $newFileName);
            $hizmet->predefined=$newFileName;
        }
        if ($hizmet->save()){
            if(count($request->category)>0){
                foreach ($request->category as $item){
                    $kategori=new CategoryPost();
                    $kategori->category_id=$item;
                    $kategori->services_id=$hizmet->id;
                    $kategori->save();
                }
            }
            Alert::success('Hizmet Güncellendi!')->persistent("Kapat");
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
        $hizmet=Services::find($id);
        unlink(public_path().'/uploads/hizmetler/'.$hizmet->predefined);
        if($hizmet->delete()){
            Alert::success('Hizmet Silindi!')->persistent("Kapat");
            return redirect()->back();
        }

    }
}
