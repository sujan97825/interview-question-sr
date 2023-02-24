<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'sku',
        'description'
    ];

    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function varient_prices(): HasMany
    {
        return $this->hasMany(ProductVariantPrice::class);
    }
    public function varient_product(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }
}
