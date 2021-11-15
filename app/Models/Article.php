<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use SoftDeletes;
    use HasFactory;
      function getcatagory(){
        return $this->hasOne('App\Models\Catagory','id','catagoryIdFk');
    }
}
