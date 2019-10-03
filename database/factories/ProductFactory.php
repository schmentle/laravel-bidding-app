<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->paragraph,
        'image' => $faker->randomElement(['/images/caffe-latte.jpg', '/images/caffe-americano.jpg', '/images/vanilla-latte.jpg'])
    ];
});
