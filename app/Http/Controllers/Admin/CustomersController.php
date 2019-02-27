<?php

namespace App\Http\Controllers\Admin;

use App\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class CustomersController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['musteriler']=Customers::all();
        return view('admin.customer.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $musteri=new Customers();
        $musteri->name=$request->name;
        $musteri->phone=$request->phone;
        $musteri->email=$request->email;
        if($musteri->save()){
            Alert::success('Müşteri Oluşturuldu!')->persistent("Kapat");
            return redirect('/admin/musteri/'.$musteri->id.'/edit');
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
        $this->data['musteri']=Customers::with('pdf')->where('id',$id)->first();
        //dd($this->data);
        return view('admin.customer.edit',$this->data);
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
        $musteri=Customers::find($id);
        $musteri->name=$request->name;
        $musteri->phone=$request->phone;
        $musteri->email=$request->email;
        if($musteri->save()){
            Alert::success('Müşteri Bilgileri Güncellendi!')->persistent("Kapat");
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
        //
    }
}
