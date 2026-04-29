<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismAttractionPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'tourism_bontocattraction_id',
        'image_file',
    ];
}
