<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use App\ProductAcce;
use App\ProductNawing;
use App\ProductType;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'price' => random_int(500000,1000000),
        'promotion_price' => random_int(0,200),
        'image' => 'image/'.random_int(1,26).'.jpg',
        'category_id' => random_int(1,Category::count()),
        'acce_id' => random_int(1,ProductAcce::count()),
        'nawing_id' => random_int(1,ProductNawing::count()),
        'type_id' => random_int(1,ProductType::count())
    ];
});
