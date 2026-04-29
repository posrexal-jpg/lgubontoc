<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'section',
        'description',
        'image',
        'date_posted',
        'sort_order',
        'active'
    ];

    protected $dates = ['date_posted'];
}
