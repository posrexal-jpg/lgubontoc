<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    protected $fillable = [
        'page_key',
        'title',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getImageUrlAttribute(): string
    {
        return url('uploads/hero-images/'.$this->image);
    }

    public static function imageUrlFor(string $pageKey, string $fallback): string
    {
        $hero = static::where('page_key', $pageKey)
            ->where('is_active', true)
            ->first();

        return $hero ? $hero->image_url : asset($fallback);
    }
}
