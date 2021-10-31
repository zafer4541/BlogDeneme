<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pages;


Route::get('/', [pages::class,'homepage']);
Route::get('/index', [pages::class,'homepage']);
Route::get('/contact', [pages::class,'contactpage']);
Route::get('/about', [pages::class,'aboutpage']);
Route::get('/post', [pages::class,'postpage']);
