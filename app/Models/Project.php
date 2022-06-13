<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'client_id',
        'manager_id',
        'status_id',
        'title',
        'deadline',
        'description',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getDeadlineAttribute($deadline)
    {
        return Carbon::parse($deadline);
    }

    public function scopeFilter($query, $filters)
    {
        if (array_key_exists('status', $filters)) {
            $query->whereStatus($filters['status']);
        }
    }

    public function scopeOpen($query)
    {
        $this->whereStatus($query, 'Open');
    }

    public function scopeInProgress($query)
    {
        $this->whereStatus($query, 'In-Progress');
    }

    public function scopeClosed($query)
    {
        $this->whereStatus($query, 'Closed');
    }

    public function scopeWhereStatus($query, $status)
    {
        $query->whereHas('status', function($query) use($status) {
            $query->whereName($status);
        });
    }
}
