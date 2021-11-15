<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\catagory as Catagory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
/****************Get****************/
    /* Tüm makaleleri gösterir*/
    public function index()
    {
        $articles=Article::all();
        $name=Auth::user()->get()[0]->name;
       return view('Back/index',compact('articles','name'));
    }

    /* yeni makale oluşturma sayfasını göster*/
    public function index2(Request $request)
    {
        $catagory=Catagory::all();
        $name=Auth::user()->get()[0]->name;
        return view('Back/newarticle',compact('catagory','name'));
    }

    /* Seçilen makaleyi gösterir*/
    public function show($id)
    {
        $article=Article::all()->where('id','=',$id)->first();
        $catagory=Catagory::all();
        $name=Auth::user()->get()[0]->name;
        return view('Back/newarticle',compact('catagory','name','article'));
    }

    /* Seçilen makalenin düzenlenme kısmını açar*/
    public function edit($id)
    {
        $article=Article::all()->where('id','=',$id)->first();
        $catagory=Catagory::all();
        $name=Auth::user()->get()[0]->name;
       return view('Back/updatearticle',compact('catagory','name','article'));
    }

/****************Post****************/
    /* Yeni makale oluşturur*/
    public function create(Request $request)
    {
        if ($request->segment(3)=="makale"){
            $validation=$request->validate([
                'title'=>'min:3 | required',
                'catagory'=>'required',
                'icerik'=>'min:10 | required',
                'resim'=>'required | image | mimes:jpeg,png,jpg | max:2048'
            ]);
            $article=new Article();
            $article->title=$request->title;
            $article->slug=Str::Slug($request->title);
            $article->content=$request->icerik;
            $article->durum=$request->durum==1?1:0;
            $article->catagoryIdFk=$request->catagory;
            if ($request->hasFile('resim')){
                $imagename=Str::Slug($request->title).".".$request->resim->getClientOriginalExtension();
               $request->resim->move(public_path('images'),$imagename);
                $article->image="/images/".$imagename;
            }
            $article->save();
            return redirect()->back()->with('success','Metniniz başarıyla kaydedildi');
        }
    }

    /* Seçilen makaleyi günceller*/
    public function update(Request $request, $id)
    {
        if ($request->segment(3)=="makale"){
        $validation=$request->validate([
            'title'=>'min:3 | required',
            'catagory'=>'required',
            'icerik'=>'min:10 | required',
            'resim'=>'image | mimes:jpeg,png,jpg | max:2048'
        ]);
        $article=Article::all()->where('id','=',$id)->first();
        $article->title=$request->title;
        $article->slug=Str::Slug($request->title);
        $article->content=$request->icerik;
        $article->durum=$request->durum==1?1:0;
        $article->catagoryIdFk=$request->catagory;
        if ($request->hasFile('resim')){
            $imagename=Str::Slug($request->title).".".$request->resim->getClientOriginalExtension();
            $request->resim->move(public_path('images'),$imagename);
            $article->image="/images/".$imagename;
        }
        $article->save();
        return redirect()->back()->with('success','Metniniz başarıyla Güncellendi');
        }
    }
    /* Seçilen makaleyi siler*/
    public function delete($id)
    {
        $article=Article::all()->where('id','=',$id)->first();
        $article->delete();
        return redirect()->back()->with('success','Metniniz başarıyla silindi');
    }
}
