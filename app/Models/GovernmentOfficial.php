<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentOfficial extends Model
{
    protected $fillable = [
        'category',
        'name',
        'position',
        'photo',
        'description',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? url('uploads/government-officials/'.$this->photo)
            : asset('assets/images/user.png');
    }
}
