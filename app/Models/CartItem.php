<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['cart_id', 'product_id', 'product_image_id', 'product_size_id', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductImage::class, 'product_image_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }

    public function unitPrice(): float
    {
        $p = $this->product;
        return (float) ($p->sale_price ?? $p->price);
    }

    public function lineTotal(): float
    {
        return $this->unitPrice() * $this->quantity;
    }
}
