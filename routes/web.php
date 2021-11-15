<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Frontpages;
use App\Http\Controllers\Back\Backpages;
use App\Http\Controllers\Back\ArticleController;

/*---------Back Routes----------*/
Route::prefix('admin')->name('dashboard.')->group(function(){
    Route::post('panel',[Backpages::class,'post_login'])->name('post_login');
    Route::get('panel',[Backpages::class,'index'])->name('index');
    Route::get('login',[Backpages::class,'login'])->name('login');

   // Route::resource('makale',[ArticleController::class]);
    Route::middleware('auth')->prefix('panel/makale')->group(function(){
        Route::get('/index',[ArticleController::class,'index'])->name('makale.index');
        Route::get('/index2',[ArticleController::class,'index2'])->name('makale.index2');
        Route::get('/show/{id}',[ArticleController::class,'show'])->name('makale.show');
        Route::get('/edit/{id}',[ArticleController::class,'edit'])->name('makale.edit');

        Route::get('/delete/{id}',[ArticleController::class,'delete'])->name('makale_delete');
        Route::post('/create',[ArticleController::class,'create'])->name('makale_create');
        Route::put('/update/{id}',[ArticleController::class,'update'])->name('makale_update');
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
