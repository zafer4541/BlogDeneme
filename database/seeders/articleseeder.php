<?php

namespace Database\Seeders;
/*
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator;
Use Faker\Factory as Fake ;*/

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator;
Use Faker\Factory as Fake ;
class articleseeder extends Seeder
{
    public function run()
    {
        $faker = Fake::create();

        for ($i=0;$i<4;$i++){
        $title= $faker->sentence(8);
        DB::table('articles')->insert([
            'title'=>$title,
            'slug'=>Str::slug($title),
            'content'=>$faker->paragraph(50),
            'image'=>$faker->imageUrl(720, 360, 'animals', true, 'cats'),
            'catagoryIdFk'=>rand(1,5),
            'created_at'=>$faker->dateTime(),
            'updated_at'=>now()
        ]);
        }

    }
}
