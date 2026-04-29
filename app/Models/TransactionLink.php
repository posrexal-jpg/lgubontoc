<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'sort_order',
        'opens_new_tab',
        'is_active',
    ];

    protected $casts = [
        'opens_new_tab' => 'boolean',
        'is_active' => 'boolean',
    ];
}
