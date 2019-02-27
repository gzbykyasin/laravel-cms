<?php

namespace App\Providers;

use App\FormMessage;
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
        view()->share('formmesaj',$this->data['formmesaj']);
    }
}
