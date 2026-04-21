<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class ProductImage extends Model
{
    use HasTranslations;

    public $translatable = ['color_name'];

    protected $fillable = [
        'product_id', 'image', 'color_name',
        'color_hex', 'is_primary', 'is_hover', 'sort_order', 'quantity',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'is_hover'   => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute(): string
    {
        return \Storage::disk('public')->url($this->image);
    }
}
