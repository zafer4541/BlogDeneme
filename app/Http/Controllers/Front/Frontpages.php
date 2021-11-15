<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Catagory;
use App\Models\Contact;
use Illuminate\Http\Request;

class Frontpages extends Controller
{
    public function homepage(){
        $catagory_data=Catagory::all();
        $article_data=Article::orderBy('created_at','desc')->get();
        return view('Front/homepage',compact('catagory_data','article_data'));
    }

    public function contactpage(){
        return view('Front/contactpage');
    }
    public function contactpost(Request $request){
        $validate=$request->validate([
            'name'=>'required | min:5',
            'email'=>'required | email',
            'message'=>'required | min:10',
        ]);
        $contact=new Contact();
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->message;
        $contact->save();
        return redirect()->route('contactpage')->with('succes','Mesajınız başarıyla bize iletildi');
    }
    public function aboutpage(){
        return view('Front/aboutpage');
    }

    public function catagorypage($catagory){
        $catagory_data=Catagory::all();

        $article_inCatagory=Catagory::where('slug','=',$catagory)->first()->
            getarticles ?? abort(403, 'böyle bir katagori bulunamadı');
        $catagory_name=Catagory::where('slug','=', $catagory)->first()->name;
        return view('Front/catagorypage',compact('article_inCatagory','catagory_name','catagory_data'));
    }



    public function postpage($catagory=null,$slug=null){
        if ($slug!=null and $catagory!=null){
            $article_data=Article::where('slug','=',$slug)->first();
            $catagorycontrol=$article_data->getcatagory->slug ?? abort(403,'Bu katagoriye ait bir sayfa bulunamadı');
            if ($catagorycontrol==$catagory){
                $article_data->increment('hit');
                return view('Front/postpage',compact('article_data'));
            }
            else
                abort(403,'Böyle bir sayfa bulunamadı');
        }

        else{
            $article_data=Article::orderBy('created_at','Desc')->first();
            $article_data->increment('hit');
            return view('Front/postpage',compact('article_data'));
        }


    }

}
