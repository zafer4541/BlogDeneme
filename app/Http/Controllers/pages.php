<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class pages extends Controller
{
    public function homepage(){
        $catagory_data=Catagory::all();
        return view('homepage',compact('catagory_data'));
    }

    public function contactpage(){
        return view('contactpage');
    }
    public function aboutpage(){
        return view('aboutpage');
    }
    public function postpage(){
        return view('postpage');
    }
}
