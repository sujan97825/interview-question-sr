<?php

namespace App\Models;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariantPrice extends Model
{
    public function product_variants(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
