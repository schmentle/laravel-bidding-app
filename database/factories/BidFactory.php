<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bid;
use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Bid::class, function (Faker $faker) {
    $product = Product::all()->random();
    return [
        'user_id' => factory(User::class)->create()->id,
        'product_id' => $product->id,
        'amount' => $faker->randomFloat(2, 1,200)
    ];
});
