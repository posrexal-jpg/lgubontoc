<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus_location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'address',
        'latitude',
        'longitude',
        'map_embed_url',
    ];
}
