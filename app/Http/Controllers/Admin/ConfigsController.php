<?php

namespace App\Http\Controllers\Admin;

use App\Config;
use App\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ConfigsController extends Controller
{
    protected $data=array();

    public function index()
    {
        $this->data['ayarlar']=Config::find(1);
        //dd($this->data);
        return view('admin.config.edit',$this->data);
    }


    public function edit(Request $request)
    {
        $config=Config::find(1);
        $config->name=$request->name;
        $config->description=$request->description;
        $config->keywords=$request->keywords;
        $config->email=$request->email;
        $config->slug=$request->slug;
        $config->phone_mobile=$request->phone_mobile;
        $config->phone_fixed=$request->phone_fixed;
        $config->instagram=$request->instagram;
        $config->youtube=$request->youtube;
        $config->linkedin=$request->linkedin;
        $config->google=$request->google;
        $config->facebook=$request->facebook;
        $config->address=$request->address;
        if ($request->hasFile('predefined')){

            $newFileName = Helper::fileNameGenerate('uploads/', $request->predefined->getClientOriginalName(), $request->predefined->getClientOriginalExtension());
            $request->predefined->move('uploads/' , $newFileName);
            $config->predefined=$newFileName;
        }
        if($config->save()){
            Alert::success('Ayarlar Güncellendi!')->persistent("Close");
            return redirect()->back();
        }
    }


}
