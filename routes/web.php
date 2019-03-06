<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear',function(){
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect('/');
});
Auth::routes();

Route::namespace('Admin')->prefix('admin')->group(function (){

    Route::get('/','DashboardController@index');
    Route::get('/anasayfa','HomePageController@index');
    Route::post('/anasayfa','HomePageController@edit');
    Route::get('/ayarlar','ConfigsController@index');
    Route::post('/ayarlar','ConfigsController@edit');
    Route::post('/galeriphoto/{slug}','GalleriesController@photodestroy')->name('photo.sil');
    Route::resource('/galeri','GalleriesController');
    Route::resource('/musteri','CustomersController');
    Route::resource('/yazi','PostsController');
    Route::resource('/hizmet','ServicesController');
    Route::resource('/etiket','TagsController');
    Route::resource('/kategori','CategoriesController');
    Route::resource('/pdf','CustomerPdfController');
    Route::resource('/yazi','PostsController');
    Route::resource('/video','VideoGalleryController');
    Route::resource('/proje','ProjectController');
    Route::resource('/formlar','FormMessagesController');

});
