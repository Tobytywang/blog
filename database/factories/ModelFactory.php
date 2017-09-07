<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use \App\Category;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

// 填充Article
$factory->define(App\Article::class, function (Faker\Generator $faker) {
    // $category_id = App\Category::pluck('id')->random();
    $slug = $faker->sentence(mt_rand(1, 2));
    $title = $slug;

    return [
        'title'       => $title,
        'slug'        => "/article/".$slug,
        'content'     => '内容',
        'markdown'    => '内容',
    ];
});

// 填充Category
$factory->define(App\Category::class, function(Faker\Generator $faker) {
    $name = $faker->word(mt_rand(1, 1));
    return [
        'name'        => $name,
        'path'        => '/category/'.$name,
        'type'        => 'column',
    ];

});

$factory->define(App\Tag::class, function(Faker\Generator $faker) {
    $tag = $faker->word(mt_rand(1,1));
    return [
        'tag'         => $name,
    ];
});