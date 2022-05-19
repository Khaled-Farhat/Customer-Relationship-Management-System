<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Document extends Media
{
    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->format('Y/m/d - H:i');
    }
}
