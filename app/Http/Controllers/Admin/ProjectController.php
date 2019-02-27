<?php

namespace App\Http\Controllers\Admin;

use App\Galleries;
use App\Helper;
use App\Projects;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ProjectController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['projeler']=Projects::all();
        return view('admin.project.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['hizmetler']=Services::all();
        return view('admin.project.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proje=new Projects();

        $proje->service=$request->service;
        $proje->name=$request->name;
        $proje->description=$request->description;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/proje/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/proje/' , $newFileName);
            $proje->predefined=$newFileName;
        }

        if ($proje->save()){
            Alert::success('Proje Eklendi!')->persistent("Kapat");
            return redirect('/admin/proje/'.$proje->id.'/edit');
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
        $this->data['hizmetler']=Services::all();
        $this->data['proje']=Projects::find($id);
        //dd($this->data);
        return view('admin.project.edit',$this->data);
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
        $proje=Projects::find($id);

        $proje->service=$request->service;
        $proje->name=$request->name;
        $proje->description=$request->description;
        if(!empty($request->predefined)){
            $newFileName = Helper::fileNameGenerate('uploads/proje/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/proje/' , $newFileName);
            $proje->predefined=$newFileName;
        }

        if ($proje->save()){
            Alert::success('Proje Güncellendi!')->persistent("Kapat");
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
        $proje=Projects::find($id);
        unlink(public_path().'/uploads/proje/'.$proje->predefined);
        if($proje->delete()){
            Alert::success('Proje Silindi!')->persistent("Kapat");
            return redirect()->back();
        }
    }
}
