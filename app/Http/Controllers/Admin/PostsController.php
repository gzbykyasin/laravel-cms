<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\CategoryPost;
use App\Galleries;
use App\Helper;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class PostsController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['yazilar']=Post::all();
        return view('admin.post.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['kategoriler']=Categories::all();
        $this->data['galeriler']=Galleries::all();
        return view('admin.post.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $yazi=new Post();

        $yazi->gallery_id=$request->gallery_id;
        $yazi->title=$request->title;
        $yazi->description=$request->description;
        $yazi->keywords=$request->keywords;
        $yazi->author=$request->author;
        $yazi->data=$request->data;
        $yazi->tags=$request->tags;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/blog/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/blog/' , $newFileName);
            $yazi->predefined=$newFileName;
        }
        if ($yazi->save()){
            /*if(count($request->category)>0){
                foreach ($request->category as $item){
                    $kategori=new CategoryPost();
                    $kategori->category_id=$item;
                    $kategori->post_id=$yazi->id;
                    $kategori->save();
                }
            }*/
            Alert::success('Yazı Eklendi!')->persistent("Kapat");
            return redirect('/admin/yazi/'.$yazi->id.'/edit');
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
        $this->data['galeriler']=Galleries::all();
        $this->data['yazi']=Post::with('category')->where('id',$id)->first();
        //dd($this->data);
        return view('admin.post.edit',$this->data);
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
        $yazi=Post::find($id);

        $yazi->gallery_id=$request->gallery_id;
        $yazi->title=$request->title;
        $yazi->description=$request->description;
        $yazi->keywords=$request->keywords;
        $yazi->author=$request->author;
        $yazi->data=$request->data;
        $yazi->tags=$request->tags;

        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/blog/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/blog/' , $newFileName);
            $yazi->predefined=$newFileName;
        }
        if ($yazi->save()){
            /*if(count($request->category)>0){
                foreach ($request->category as $item){
                    $kategori=new CategoryPost();
                    $kategori->category_id=$item;
                    $kategori->post_id=$yazi->id;
                    $kategori->save();
                }
            }*/
            Alert::success('Yazı Güncellendi!')->persistent("Kapat");
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
        $yazi=Post::find($id);
        unlink(public_path().'/uploads/blog/'.$yazi->predefined);
        if($yazi->delete()){
            Alert::success('Yazı Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
    }
}
