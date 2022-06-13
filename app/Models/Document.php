<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Document extends Media
{
    use SoftDeletes;

    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt);
    }
}
