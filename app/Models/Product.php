<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $sku
 * @property float $price
 * @property string $image
 * @property int $visits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Product extends Model
{
    /**
     * Get bids for product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * Get highest bid for product
     *
     * @return mixed
     */
    public function highest()
    {
        return $this->bids()->orderBy('amount', 'desc')->first()->amount ?? '-';
    }

    /**
     * Get average bid for product
     *
     * @return mixed
     */
    public function average()
    {
        return $this->bids()->get()->avg('amount') ?? '-';
    }
}
