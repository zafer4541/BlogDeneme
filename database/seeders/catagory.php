<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class catagory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cata_data=['Spor','Satranç','Okul','Sosyal Hayat','Projeler'];
        foreach ($cata_data as $data){
            DB::table('catagories')->insert([
                'name'=>$data,
                'slug'=>Str::of($data)->slug('-')
            ]);
        }

    }
}
