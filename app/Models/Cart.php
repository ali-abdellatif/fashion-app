<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['customer_id', 'note'];

    protected $casts = ['customer_id' => 'integer'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class)->with(['product', 'color', 'size']);
    }

    public function totalQuantity(): int
    {
        return $this->items->sum('quantity');
    }

    public function subtotal(): float
    {
        return $this->items->sum(fn ($item) => $item->lineTotal());
    }

    /** Get or create cart for logged-in customer */
    public static function forCustomer(): self
    {
        return static::firstOrCreate(
            ['customer_id' => auth('customer')->id()]
        );
    }
}
