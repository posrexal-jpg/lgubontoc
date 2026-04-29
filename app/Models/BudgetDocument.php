<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'year', 'category', 'file_path', 'description', 'active'
    ];
}
