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


Auth::routes();

Route::namespace('Web')->group(function (){
    Route::get('/', 'HomePageController@index')->name('home');
    Route::get('/kurumsal.html','StandartPagesController@about')->name('about');
    Route::get('/iletisim.html','StandartPagesController@contact')->name('contact');
    Route::post('/sendForm','StandartPagesController@sendForm')->name('sendForm');
    Route::get('/hizmetler','ServicesController@services')->name('services');
    Route::get('/hizmetler/{slug}.html','ServicesController@service_detail')->name('service_detail');
    Route::get('/projeler.html','ProjectsController@index')->name('projects');
    Route::get('/video-galeri.html','ServicesController@video_gallery')->name('video_gallery');
    Route::get('/blog','BlogController@index')->name('blog');
    Route::get('/blog/{slug}.html','BlogController@blog_detail')->name('blog_detail');
    Route::get('/kategori','CategoryController@index')->name('category');
    Route::get('/kategori/{slug}.html','CategoryController@category_detail')->name('category_detail');
});

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
