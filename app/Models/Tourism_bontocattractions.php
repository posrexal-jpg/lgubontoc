<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourism_bontocattractions extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(TourismAttractionPhoto::class, 'tourism_bontocattraction_id');
    }
}
