<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariant extends Model
{

    /**
     * Get the user that owns the ProductVariant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variants(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }
}
