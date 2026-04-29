<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparencyFdpReport extends Model
{
    protected $fillable = [
        'title',
        'quarter',
        'year',
        'description',
        'file_path',
        'file_name',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'year' => 'integer',
        'sort_order' => 'integer',
        'is_published' => 'boolean',
    ];

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? url('uploads/fdp-reports/'.$this->file_path) : null;
    }

    public function getPeriodAttribute(): string
    {
        return trim(collect([$this->quarter, $this->year])->filter()->implode(', '));
    }
}
