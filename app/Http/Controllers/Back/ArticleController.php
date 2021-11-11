<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
/****************Get****************/
    /* Tüm makaleleri gösterir*/
    public function index()
    {
        $articles=Article::all();
       return view('Back/crudtable',compact('articles'));
    }

    /* yeni makale oluşturma sayfasını göster*/
    public function index2(Request $request)
    {
        return "yeni makale oluşturma sayfası";
    }

    /* Seçilen makaleyi gösterir*/
    public function show($name,$id)
    {
       return $name."Seçilen makaleyi göster ".$id;
    }

    /* Seçilen makalenin düzenlenme kısmını açar*/
    public function edit($name,$id)
    {
       return $name."Seçilen makalenin düzenlenme kısmını açar ".$id;
    }

/****************Post****************/
    /* Yeni makale oluşturur*/
    public function create()
    {

    }

    /* Seçilen makaleyi günceller*/
    public function update(Request $request, $id)
    {
        //
    }
    /* Seçilen makaleyi siler*/
    public function destroy($name,$id)
    {
        return $name."Seçilen makaleyi sil ".$id;
    }
}
