<?php

use Illuminate\Database\Seeder;
use \App\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Category::class, 5)->create()->each(function($category){
//            $category->articles()->save(factory(\App\Article::class)->make());
//        });
        factory(Category::class, 6)->create();
    }
}
