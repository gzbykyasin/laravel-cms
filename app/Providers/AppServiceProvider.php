<?php

namespace App\Providers;

use App\Categories;
use App\CategoryPost;
use App\Config;
use App\FormMessage;
use App\Services;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{

    protected $data=array();
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->data['formmesaj']=FormMessage::orderBy('created_at','desc')->limit(5)->get();
        $this->data['tumkategoriler']=Categories::limit(4)->get();
        $this->data['menuhizmetler']=Services::select(['name','slug','id'])->where('menu','=','1')->get();
        foreach ($this->data['menuhizmetler'] as $key=>$menhiz){
            $this->data['menuhizmetler'][$key]['alt']=CategoryPost::where('services_id',$menhiz->id)->get();
        }
        $this->data['ayarlar']=Config::find(1);

        view()->share('ayarlar',$this->data['ayarlar']);
        view()->share('menuhizmetler',$this->data['menuhizmetler']);
        view()->share('tumkategoriler',$this->data['tumkategoriler']);
        view()->share('formmesaj',$this->data['formmesaj']);
    }
}
