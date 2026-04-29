<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentOfficial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'position', 'office', 'photo', 'bio', 'contact', 'sort_order', 'active'
    ];
}
