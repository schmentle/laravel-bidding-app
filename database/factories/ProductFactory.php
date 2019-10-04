<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->paragraph,
        'sku' => $faker->uuid,
        'price' => $faker->randomFloat(2, 1,200),
        'image' => $faker->randomElement(['/images/caffe-latte.jpg', '/images/caffe-americano.jpg', '/images/vanilla-latte.jpg'])
    ];
});
