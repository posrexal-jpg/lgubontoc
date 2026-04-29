<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsandUpdates_news extends Model
{
    use HasFactory;

    protected $table = 'newsand_updates_news';

    protected $fillable = [
        'title',
        'author',
        'category',
        'description',
        'image_file',
        'status',
        'date_posted',
    ];
}
