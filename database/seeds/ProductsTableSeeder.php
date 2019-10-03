<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['title' => 'Caffè Latte', 'description' => 'Caffè latte is a coffee-based drink made primarily from espresso and steamed milk. Depending on the skill of the barista, the foam can be poured in such a way to create a picture.', 'image' => '/images/caffe-latte.jpg'],
            ['title' => 'Caffè Americano', 'description' => 'Caffè Americano is a type of coffee drink prepared by diluting an espresso with hot water, giving it a similar strength to, but different flavor from, traditionally brewed coffee.', 'image' => '/images/caffe-americano.jpg'],
            ['title' => 'Vanilla Latte', 'description' => 'Caffè latte is a coffee-based drink made primarily from espresso, steamed milk and vanilla flavoring.', 'image' => '/images/vanilla-latte.jpg'],
            ['title' => 'Cappuccino', 'description' => 'A cappuccino is an espresso-based coffee drink that originated in Italy, and is traditionally prepared with steamed milk foam.', 'image' => '/images/cappuccino.jpg'],
            ['title' => 'Espresso', 'description' => 'Espresso is coffee of Italian origin, brewed by forcing a small amount of nearly boiling water under pressure through finely ground coffee beans. Espresso is generally thicker than coffee brewed by other methods.', 'image' => '/images/espresso.jpg'],
            ['title' => 'Piccolo Latte', 'description' => 'Traditionally, a Piccolo Latte is a ristretto shot (15 – 20 ml) topped with warm, silky milk served in a 100 ml glass demitasse.', 'image' => '/images/piccolo-latte.jpg'],
        ])->each(function($item){
            factory(Product::class)->create([
                'title' => $item['title'],
                'description' => $item['description'],
                'image' => $item['image'],
            ]);
        });
    }
}
