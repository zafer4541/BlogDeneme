<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
   function getarticles(){
      return $this->hasMany('App\Models\Article','catagoryIdFk','id')->orderBy('created_at','Desc')->where('durum','=','1');
   }
}
