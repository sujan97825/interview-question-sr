<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variant extends Model
{
    protected $fillable = [
        'title', 'description'
    ];
/**
 * Get all of the comments for the Variant
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function product_variants(): HasMany
{
    return $this->hasMany(ProductVariant::class, 'variant_id', 'id');
}
}
