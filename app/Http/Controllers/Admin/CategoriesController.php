<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class CategoriesController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['kategoriler']=Categories::all();
        return view('admin.categories.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori=new Categories();

        $kategori->title=$request->title;
        $kategori->description=$request->description;
        $kategori->keywords=$request->keywords;

        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/kategori/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/kategori/' , $newFileName);
            $kategori->predefined=$newFileName;
        }

        if ($kategori->save()){
            Alert::success('Kategori Eklendi!')->persistent("Kapat");
            return redirect('/admin/kategori/'.$kategori->id.'/edit');
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
        $this->data['kategori']=Categories::find($id);
        return view('admin.categories.edit',$this->data);
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
        $kategori=Categories::find($id);

        $kategori->title=$request->title;
        $kategori->description=$request->description;
        $kategori->keywords=$request->keywords;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/kategori/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/kategori/' , $newFileName);
            $kategori->predefined=$newFileName;
        }

        if ($kategori->save()){
            Alert::success('Kategori Güncellendi!')->persistent("Kapat");
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
        $kategori=Categories::destroy($id);
        unlink(public_path().'/uploads/kategori/'.$kategori->predefined);
        if($kategori->delete()){
            Alert::success('Kategori Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
    }
}
