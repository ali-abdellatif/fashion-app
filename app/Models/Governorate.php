<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name'];

    protected $fillable = ['name', 'shipping_price', 'is_active'];

    protected $casts = [
        'shipping_price' => 'decimal:2',
        'is_active'      => 'boolean',
    ];
}
