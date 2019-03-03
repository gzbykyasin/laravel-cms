<?php

namespace App\Http\Controllers\Web;

use App\Categories;
use App\Config;
use App\FormMessage;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class StandartPagesController extends Controller
{
    protected $data=array();
    public function __construct()
    {

    }

    public function about(){
        //dd($this->data);
        return view('frontend.about',$this->data);
    }

    public function contact(){
       // dd($this->data);
        return view('frontend.contact',$this->data);
    }

    public function sendForm(Request $request){
        $rules=[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'title'=>'required',
            'service'=>'required',
            'data'=>'required'
        ];
        $messages=[
            'name.required'=>'İsim Soyisim Alanı Zorunludur',
            'email.required'=>'Email Alanı Zorunludur',
            'phone.required'=>'Telefon Alanı Zorunludur',
            'title.required'=>'Mesaj Başlığı Alanı Zorunludur',
            'service.required'=>'Hizmet Seçme Alanı Zorunludur',
            'data.required'=>'Mesaj İçeriği Alanı Zorunludur'
        ];
        //dd($request);
        $this->validate($request,$rules,$messages);

        $form=new FormMessage();
        $form->name=$request->name;
        $form->email=$request->email;
        $form->phone=$request->phone;
        $form->title=$request->title;
        $form->data=$request->data;
        $form->service=$request->service;
        //dd($form);
        if($form->save()){
            Alert::success('Başarıyla Gönderildi');
            return redirect()->back();
        }

    }
}
