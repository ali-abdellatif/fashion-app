<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteSetting extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['address'];

    protected $fillable = [
        'logo',
        'phone_primary',
        'phone_secondary',
        'email',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'tiktok',
        'whatsapp',
    ];

    /**
     * Always returns the single settings record, creates it if not exists.
     */
    public static function instance(): static
    {
        return static::firstOrCreate([]);
    }
}
