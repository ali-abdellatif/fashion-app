<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'sale_price',
        'category_id', 'brand_id', 'is_active', 'is_best_seller', 'sort_order',
    ];

    protected static function booted(): void
    {
        static::saving(function (Product $product) {
            $enName = is_array($product->getTranslations('name'))
                ? ($product->getTranslation('name', 'en') ?? '')
                : '';

            if ($enName && empty($product->slug)) {
                $base = Str::slug($enName);
                $slug = $base;
                $i    = 1;
                while (static::where('slug', $slug)->where('id', '!=', $product->id ?? 0)->exists()) {
                    $slug = $base . '-' . $i++;
                }
                $product->slug = $slug;
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected $casts = [
        'price'          => 'decimal:2',
        'sale_price'     => 'decimal:2',
        'is_active'      => 'boolean',
        'is_best_seller' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(ProductSize::class)->orderBy('sort_order');
    }

    public function primaryImage(): ?ProductImage
    {
        return $this->images->firstWhere('is_primary', true)
            ?? $this->images->first();
    }

    public function hoverImage(): ?ProductImage
    {
        return $this->images->firstWhere('is_hover', true);
    }

    public function colorImages()
    {
        return $this->images
            ->whereNotNull('color_hex')
            ->unique('color_hex')
            ->values();
    }

    /**
     * Total stock = sum of all color quantities (if colors exist)
     * otherwise sum of size quantities.
     */
    public function totalQuantity(): int
    {
        $colorQty = $this->colorImages()->sum('quantity');
        if ($colorQty > 0) {
            return (int) $colorQty;
        }
        return (int) $this->sizes->sum('quantity');
    }
}
