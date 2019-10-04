<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Queue\SerializesModels;

class ProductVisit
{
    use SerializesModels;

    public $product;

    /**
     * Create a new event instance.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
