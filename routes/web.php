<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Frontpages;
use App\Http\Controllers\Back\Backpages;
use App\Http\Controllers\Back\ArticleController;

/*---------Back Routes----------*/
Route::prefix('admin')->name('dashboard.')->group(function(){
    Route::post('panel',[Backpages::class,'post_login'])->name('post_login');
    Route::get('panel/{name}',[Backpages::class,'index'])->name('index');
    Route::get('login',[Backpages::class,'login'])->name('login');

   // Route::resource('makale',[ArticleController::class]);
    Route::prefix('panel/{name}/makale')->group(function(){

        Route::get('/index',['as'=>'makale.index','uses'=>'App\Http\Controllers\Back\ArticleController@index']);
        Route::get('/index2',['as'=>'makale.index','uses'=>'App\Http\Controllers\Back\ArticleController@index2']);
        Route::get('/show/{id}',['as'=>'makale.view','uses'=>'App\Http\Controllers\Back\ArticleController@show']);
        Route::get('/edit/{id}',['as'=>'makale.edit','uses'=>'App\Http\Controllers\Back\ArticleController@edit']);
        Route::post('/create',['as'=>'makale.store','uses'=>'App\Http\Controllers\Back\ArticleController@create']);
        Route::patch('/update/{id}',['as'=>'makale.update','uses'=>'App\Http\Controllers\Back\ArticleController@update']);
        Route::delete('/destroy/{id}',['as'=>'makale.destroy','uses'=>'App\Http\Controllers\Back\ArticleController@destroy']);
    });

});






/*--------Front Routes----------*/
Route::get('/', [Frontpages::class,'homepage']);
Route::get('/index', [Frontpages::class,'homepage'])->name('homepage');
Route::get('/contact', [Frontpages::class,'contactpage'])->name('contactpage');

Route::post('/contact', [Frontpages::class,'contactpost'])->name('contactpost');

Route::get('/about', [Frontpages::class,'aboutpage'])->name('aboutpage');
Route::get('/samplepost', [Frontpages::class,'postpage'])->name('samplepost');
Route::get('/{catagory}/{slug}', [Frontpages::class,'postpage'])->name('catagory_slug');
Route::get('/{catagory}', [Frontpages::class,'catagorypage'])->name('catagorypage');
