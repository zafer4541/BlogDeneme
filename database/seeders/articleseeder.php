<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use Faker\Factory as Fake ;
class articleseeder extends Seeder
{
    public function run()
    {
        $faker = Fake::create();

        for ($i=0;$i<4;$i++){
        $title= $faker->sentence(8);
        DB::table('articles')->insert([
            'title'=>$faker->$title,
            'slug'=>$faker->slug($title),
            'content'=>$faker->paragraph(5),
            'image'=>$faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'catagoryIdFk'=>rand(1,5)
        ]);
        }

    }
}
