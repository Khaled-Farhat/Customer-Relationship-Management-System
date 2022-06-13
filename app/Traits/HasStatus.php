<?php

namespace App\Traits;

trait HasStatus
{
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
