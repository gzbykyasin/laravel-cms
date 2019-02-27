<?php

namespace App\Http\Controllers\Admin;

use App\CustomerPdf;
use App\Customers;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Alert;


class CustomerPdfController extends Controller
{
    protected $data=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['pdfler']=CustomerPdf::all();
        return view('admin.customerPdf.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['tarih']=Carbon::now()->format('d-m-Y');
        $this->data['musteriler']=Customers::all();
        return view('admin.customerPdf.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->data=array();
        $this->data['urun_ad']=array();
        $this->data['miktar']=array();
        $this->data['birim_fiyat']=array();
        $musteri=Customers::find($request->customer_id);

        $musteripdf=new CustomerPdf();
        $musteripdf->customer_id=$request->customer_id;
        $musteripdf->title=$request->title;
        $musteripdf->type=$request->type;
        $musteripdf->payment_type=$request->payment_type;
        $musteripdf->created_at=$request->created_at;
        if($musteripdf->save()){
            foreach ($request->urun_ad as $key=>$item){
                $data['urun_ad'][$key]=$item;
            }
            foreach ($request->tip as $key=>$item){
                $data['tip'][$key]=$item;
            }
            foreach ($request->miktar as $key=>$item){
                $data['miktar'][$key]=$item;
            }
            foreach ($request->birim_fiyat as $key=>$item){
                $data['birim_fiyat'][$key]=$item;
            }
            for($i=0;$i<sizeof($data['urun_ad']);$i++){
                $urun=new Product();
                $urun->pdf_id=$musteripdf->id;
                $urun->name=$data['urun_ad'][$i];
                $urun->type=$data['tip'][$i];
                $urun->counter=(float)$data['miktar'][$i];
                $urun->price=(float)$data['birim_fiyat'][$i];
                $urun->save();
            }
        }

        $urunler=Product::where('pdf_id',$musteripdf->id)->get();

        $data=[
            'yetkili_ad'=>$request->yetkili_name,
            'yetkili_tel'=>$request->yetkili_phone,
            'yetkili_mail'=>$request->yetkili_email,
            'yetkili_firma'=>$request->yetkili_company,
            'odeme_tipi'=>$request->payment_type,
            'para_birimi'=>$request->type,
            'musteri_ad'=>$musteri->name,
            'musteri_mail'=>$musteri->email,
            'musteri_tel'=>$musteri->phone,
            'pdf_path'=>$musteripdf->slug.'.pdf',
            'created_at'=>$musteripdf->created_at,
            'id'=>$musteripdf->id

        ];

        foreach ($urunler as $key=>$urun){
            $data['urunler'][$key]=[
                'urun_ad'=>$urun->name,
                'miktar'=>$urun->counter,
                'birim_fiyat'=>$urun->price,
                'toplam'=>$urun->counter*$urun->price,
                'tip'=>$urun->type
            ];

        }
        $pdf=PDF::loadView('admin.customerPdf.show',compact('data'));

        if($pdf->save(public_path().'/uploads/pdf/'.$data['pdf_path']))
            return redirect('/uploads/pdf/'.$data['pdf_path']);
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
        $this->data['pdf']=CustomerPdf::with('product')->where('id',$id)->first();
        //dd($this->data);
        return view('admin.customerPdf.edit',$this->data);
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
        $musteripdf=CustomerPdf::find($id);
        $musteripdf->status=$request->status;
        if($musteripdf->save()){
            Alert::success('Müşterinin Durumu Güncellendi!')->persistent("Close");
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
