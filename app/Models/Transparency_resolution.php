<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transparency_resolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'document_number',
        'description',
        'approved_date',
        'year',
        'status',
        'file_path',
        'file_name',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'approved_date' => 'date',
        'year' => 'integer',
        'sort_order' => 'integer',
        'is_published' => 'boolean',
    ];

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? url('uploads/sb-resolutions/'.$this->file_path) : null;
    }
}
